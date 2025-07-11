/* global WP_Smush */
/* global ajaxurl */
import tracker from "../utils/tracker";
import GlobalTracking from '../global-tracking';

/**
 * Modals JavaScript code.
 */
( function() {
	'use strict';

	/**
	 * Onboarding modal.
	 *
	 * @since 3.1
	 */
	WP_Smush.onboarding = {
		membership: 'free', // Assume free by default.
		onboardingModal: document.getElementById( 'smush-onboarding-dialog' ),
		first_slide: 'usage',
		settings: {
			first: true,
			last: false,
			slide: 'usage',
			value: false,
		},
		selection: {
			usage: false,
			auto: true,
			lossy: true,
			strip_exif: true,
			original: false,
			preload_images: true,
			lazy_load: true,
		},
		contentContainer: document.getElementById( 'smush-onboarding-content' ),
		onboardingSlides: [
			'usage',
			'auto',
			'lossy',
			'strip_exif',
			'original',
			'preload_images',
			'lazy_load',
		],
		touchX: null,
		touchY: null,
		recheckImagesLink: '',
		proFeaturesClicked: [],
		/**
		 * Init module.
		 */
		init() {
			if ( ! this.onboardingModal ) {
				return;
			}

			const dialog = document.getElementById( 'smush-onboarding' );

			this.membership = dialog.dataset.type;
			this.recheckImagesLink = dialog.dataset.ctaUrl;

			if ( 'pro' !== this.membership ) {
				this.onboardingSlides = [
					'usage',
					'auto',
					'lossy',
					'strip_exif',
					'original',
					'lazy_load',
					'pro_upsell',
				];
			}

			if ( 'false' === dialog.dataset.tracking ) {
				this.onboardingSlides.pop();
			}

			this.renderTemplate();

			// Skip setup.
			this.skipButton = this.onboardingModal.querySelector(
				'.smush-onboarding-skip-link'
			);
			if ( this.skipButton ) {
				this.skipButton.addEventListener( 'click', this.skipSetup.bind( this ) );
			}

			// Show the modal.
			window.SUI.openModal(
				'smush-onboarding-dialog',
				'wpcontent',
				undefined,
				false
			);
		},

		/**
		 * Get swipe coordinates.
		 *
		 * @param {Object} e
		 */
		handleTouchStart( e ) {
			const firstTouch = e.touches[ 0 ];
			this.touchX = firstTouch.clientX;
			this.touchY = firstTouch.clientY;
		},

		/**
		 * Process swipe left/right.
		 *
		 * @param {Object} e
		 */
		handleTouchMove( e ) {
			if ( ! this.touchX || ! this.touchY ) {
				return;
			}

			const xUp = e.touches[ 0 ].clientX,
				yUp = e.touches[ 0 ].clientY,
				xDiff = this.touchX - xUp,
				yDiff = this.touchY - yUp;

			if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {
				if ( xDiff > 0 ) {
					if ( false === WP_Smush.onboarding.settings.last ) {
						WP_Smush.onboarding.next( null, 'next' );
					}
				} else if ( false === WP_Smush.onboarding.settings.first ) {
					WP_Smush.onboarding.next( null, 'prev' );
				}
			}

			this.touchX = null;
			this.touchY = null;
		},

		/**
		 * Update the template, register new listeners.
		 *
		 * @param {string} directionClass Accepts: fadeInRight, fadeInLeft, none.
		 */
		renderTemplate( directionClass = 'none' ) {
			// Grab the selected value.
			const input = this.onboardingModal.querySelector(
				'input[type="checkbox"]'
			);
			if ( input ) {
				this.selection[ input.id ] = input.checked;
			}

			const template = WP_Smush.onboarding.template( 'smush-onboarding' );
			const content = template( this.settings );

			if ( content ) {
				this.contentContainer.innerHTML = content;

				if ( 'none' === directionClass ) {
					this.contentContainer.classList.add( 'loaded' );
				} else {
					this.contentContainer.classList.remove( 'loaded' );
					this.contentContainer.classList.add( directionClass );
					setTimeout( () => {
						this.contentContainer.classList.add( 'loaded' );
						this.contentContainer.classList.remove(
							directionClass
						);
					}, 600 );
				}
			}

			this.onboardingModal.addEventListener(
				'touchstart',
				this.handleTouchStart,
				false
			);
			this.onboardingModal.addEventListener(
				'touchmove',
				this.handleTouchMove,
				false
			);

			this.bindSubmit();
			this.toggleSkipButton();
			this.maybeHandleProFeatureClick();
		},

		toggleSkipButton() {
			if ( ! this.skipButton ) {
				return;
			}

			if ( this.settings.last ) {
				this.skipButton.classList.add( 'sui-hidden' );
			} else {
				this.skipButton.classList.remove( 'sui-hidden' );
			}
		},

		/**
		 * Catch "Finish setup wizard" button click.
		 */
		bindSubmit() {
			const submitButton = this.onboardingModal.querySelector(
				'button[type="submit"]'
			);
			const self = this;

			if ( submitButton ) {
				submitButton.addEventListener( 'click', function( e ) {
					e.preventDefault();

					submitButton.classList.add( 'wp-smush-link-in-progress' );

					// Because we are not rendering the template, we need to update the last element value.
					const input = self.onboardingModal.querySelector(
						'input[type="checkbox"]'
					);
					if ( input ) {
						self.selection[ input.id ] = input.checked;
					}

					self.trackFinishSetupWizard();

					const _nonce = document.getElementById(
						'smush_quick_setup_nonce'
					);

					const xhr = new XMLHttpRequest();
					xhr.open( 'POST', ajaxurl + '?action=smush_setup', true );
					xhr.setRequestHeader(
						'Content-type',
						'application/x-www-form-urlencoded'
					);
					xhr.onload = () => {
						if ( 200 === xhr.status ) {
							self.onFinishingSetup();
						} else {
							window.console.log(
								'Request failed.  Returned status of ' +
									xhr.status
							);
						}
					};
					xhr.send(
						'smush_settings=' +
							JSON.stringify( self.selection ) +
							'&_ajax_nonce=' +
							_nonce.value
					);
				} );
			}
		},

		onFinishingSetup() {
			this.onFinish();
			this.startRecheckImages();
		},

		onFinish() {
			window.SUI.closeModal();
		},

		startRecheckImages() {
			if ( ! this.recheckImagesLink ) {
				return;
			}
			window.location.href = this.recheckImagesLink;
		},

		/**
		 * Handle navigation.
		 *
		 * @param {Object}      e
		 * @param {null|string} whereTo
		 */
		next( e, whereTo = null ) {
			const index = this.onboardingSlides.indexOf( this.settings.slide );
			let newIndex = 0;

			if ( ! whereTo ) {
				newIndex =
					null !== e && e.classList.contains( 'next' )
						? index + 1
						: index - 1;
			} else {
				newIndex = 'next' === whereTo ? index + 1 : index - 1;
			}

			const directionClass =
				null !== e && e.classList.contains( 'next' )
					? 'fadeInRight'
					: 'fadeInLeft';

			this.settings = {
				first: 0 === newIndex,
				last: newIndex + 1 === this.onboardingSlides.length, // length !== index
				slide: this.onboardingSlides[ newIndex ],
				value: this.selection[ this.onboardingSlides[ newIndex ] ],
			};

			this.renderTemplate( directionClass );
		},

		/**
		 * Handle circle navigation.
		 *
		 * @param {string} target
		 */
		goTo( target ) {
			const newIndex = this.onboardingSlides.indexOf( target );

			this.settings = {
				first: 0 === newIndex,
				last: newIndex + 1 === this.onboardingSlides.length, // length !== index
				slide: target,
				value: this.selection[ target ],
			};

			this.renderTemplate();
		},

		/**
		 * Skip onboarding experience.
		 */
		skipSetup() {
			const _nonce = document.getElementById( 'smush_quick_setup_nonce' );

			// Track skip setup wizard.
			this.trackSkipSetupWizard();

			const xhr = new XMLHttpRequest();
			xhr.open(
				'POST',
				ajaxurl + '?action=skip_smush_setup&_ajax_nonce=' + _nonce.value
			);
			xhr.onload = () => {
				if ( 200 === xhr.status ) {
					this.onSkipSetup();
				} else {
					window.console.log(
						'Request failed.  Returned status of ' + xhr.status
					);
				}
			};
			xhr.send();
		},

		onSkipSetup() {
			this.onFinish();
		},

		/**
		 * Hide new features modal.
		 * @since 3.7.0
		 * @since 3.12.2 Add a new parameter redirectUrl
		 */
		hideUpgradeModal: ( e, button ) => {
			const isRedirectRequired = '_blank' !== button?.target;
			if ( isRedirectRequired ) {
				e.preventDefault();
			}

			button.classList.add( 'wp-smush-link-in-progress' );
			const redirectUrl = button?.href;
			const xhr = new XMLHttpRequest();
			xhr.open( 'POST', ajaxurl + '?action=hide_new_features&_ajax_nonce=' + window.wp_smush_msgs.nonce );
			xhr.onload = () => {
				window.SUI.closeModal();
				button.classList.remove( 'wp-smush-link-in-progress' );

				const actionName = redirectUrl ? 'cta_clicked' : 'closed';
				tracker.track( 'update_modal_displayed', {
					Action: actionName,
				} );

				if ( 200 === xhr.status ) {
					if ( redirectUrl && isRedirectRequired ) {
						window.location.href = redirectUrl;
					}
				} else {
					window.console.log(
						'Request failed.  Returned status of ' + xhr.status
					);
				}
			};
			xhr.send();
		},
		maybeHandleProFeatureClick() {
			const isProUpsellSlide = 'pro_upsell' === this.settings?.slide;
			if ( ! isProUpsellSlide ) {
				return;
			}

			this.upsellButton = this.onboardingModal.querySelector( '.smush-btn-pro-upsell' );
			const proFeatureToggleContainer = this.onboardingModal.querySelector( '.sui-field-list' );

			if ( proFeatureToggleContainer ) {
				proFeatureToggleContainer.addEventListener( 'click', ( event ) => {
					const proFeatureClicked = event.target.matches( 'label' ) || event.target.closest( '.sui-toggle' );
					if ( proFeatureClicked ) {
						const featureName = event.target.closest( '.sui-field-list-item' ).querySelector( 'input[type="checkbox"]' )?.name;
						this.handleProFeatureClicked( featureName );
					}
				});
			}

			this.maybeTrackProUpsell();
		},
		handleProFeatureClicked( featureName ) {
			this.cacheProFeatureClick( featureName );
			this.highlightUpsellButton();
		},
		highlightUpsellButton() {
			if ( ! this.upsellButton ) {
				return;
			}
			this.upsellButton.classList.remove( 'smush-btn-ripple' );
			void this.upsellButton.offsetWidth; // Trigger a reflow.
			this.upsellButton.classList.add( 'smush-btn-ripple' );
		},
		cacheProFeatureClick( proFeature ) {
			if ( ! this.proFeaturesClicked.includes( proFeature ) ) {
				this.proFeaturesClicked.push( proFeature );
			}
		},
		trackFinishSetupWizard() {
			this.trackSetupWizard( 'finish' );
		},
		trackSkipSetupWizard() {
			this.trackSetupWizard( 'quit' );
		},
		trackSetupWizard( action ) {
			const quitWizard = 'quit' === action;
			const properties = {
				Action: quitWizard ? 'quit' : 'finish',
				'Quit Step': this.getQuitStep( quitWizard ),
				'Settings Enabled': this.getEnabledSettings( quitWizard ),
				'Pro Interests': this.getProInterests(),
			};

			const allowToTrack = this.selection?.usage;

			tracker.setAllowToTrack( allowToTrack ).track( 'Setup Wizard', properties );
		},
		getQuitStep( quitWizard ) {
			if ( ! quitWizard ) {
				return 'na';
			}

			const fieldMapsForTracking = this.getFieldMapsForTracking();
			const setting = this.settings.slide;

			return setting in fieldMapsForTracking ? fieldMapsForTracking[ setting ] : 'na';
		},
		getEnabledSettings( quitWizard ) {
			if ( quitWizard ) {
				return 'na';
			}

			const fieldMapsForTracking = this.getFieldMapsForTracking();
			const enabledSettings = [];

			Object.entries( this.selection ).forEach( ( [ setting, enabled ] ) => {
				if ( enabled ) {
					const featureName = setting in fieldMapsForTracking ? fieldMapsForTracking[ setting ] : setting;
					enabledSettings.push( featureName );
				}
			} );

			return enabledSettings;
		},
		getProInterests() {
			if ( 'pro' === this.membership || ! this.proFeaturesClicked.length ) {
				return 'na';
			}

			return this.proFeaturesClicked;
		},
		getFieldMapsForTracking() {
			return {
				usage: 'tracking',
				auto: 'auto_smush',
				lossy: 'free' === this.membership ? 'super_smush' : 'ultra_smush',
				strip_exif: 'strip_exif',
				original: 'full_size',
				lazy_load: 'lazy_load',
				pro_upsell: 'upgrade',
				preload_images: 'preload_images',
			};
		},
		maybeTrackProUpsell() {
			if ( ! this.upsellButton ) {
				return;
			}

			this.upsellButton.addEventListener( 'click', ( event ) => {
				const allowToTrack = this.selection?.usage;
				tracker.setAllowToTrack( allowToTrack );
				( new GlobalTracking() ).trackSetupWizardProUpsell( event?.target?.href, this.getProInterests() );
			} );
		}
	};

	/**
	 * Template function (underscores based).
	 *
	 * @type {Function}
	 */
	WP_Smush.onboarding.template = _.memoize( ( id ) => {
		let compiled;
		const options = {
			evaluate: /<#([\s\S]+?)#>/g,
			interpolate: /{{{([\s\S]+?)}}}/g,
			escape: /{{([^}]+?)}}(?!})/g,
			variable: 'data',
		};

		return ( data ) => {
			_.templateSettings = options;
			compiled =
				compiled ||
				_.template( document.getElementById( id ).innerHTML );
			data.first_slide = WP_Smush.onboarding.first_slide;
			return compiled( data );
		};
	} );

	window.addEventListener( 'load', () => WP_Smush.onboarding.init() );
}() );
