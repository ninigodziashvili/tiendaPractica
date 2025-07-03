<?php
get_header();
?>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="container">
            <nav class="navbar" aria-label="Navegación principal">
                <a href="#" class="logo">Susanita Urban</a>
                <ul class="nav-links">
                    <li><a href="#sobre-mi">Sobre mí</a></li>
                    <li><a href="#ganchillo">Ganchillo</a></li>
                    <li><a href="#hecho-mano">Hecho a mano</a></li>
                    <li><a href="#filosofia">Filosofía</a></li>
                    <li><a href="#dog-lover">Bolsos Caninos</a></li>
                    <li><a href="#productos">Productos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero" role="banner">
            <div class="hero-content" role="heading" aria-level="1">
                <h1>Complementos hechos a mano sólo para ti.</h1>
                <p>Cada bolso y accesorio está hecho a mano, pensado para que expreses tu personalidad única.</p>
                <a href="#productos" class="btn-primary" aria-label="Quiero el mío ya">👉 Quiero el mío ya</a>
            </div>
        </section>

        <!-- Sobre mí -->
        <section id="sobre-mi" class="section">
            <div class="sobre-mi-glass">
                <div class="container">
                    <h2 class="ganchillo">Sobre mí</h2>
                    <div class="bio-content">
                        <div class="bio-text">
                            <p class="ganchillo">El ganchillo ocupa un lugar muy especial en mi historia. Fue mi tía quien, con infinita paciencia, enseñó a manejar los hilos a esta chica zurda que parecía que no aprendería: al principio torpe, pero siempre llena de ganas y risas.</p>
                            <p class="ganchillo">Poco a poco descubrí la calma, el cariño y la alegría de transformar un simple ovillo en algo único. Ese camino me llevó a obtener diferentes reconocimientos y premios, y, sobre todo, me enseñó que lo más valioso no es solo lo que se crea, sino todo lo que se teje alrededor.</p>
                            <p class="ganchillo">Apasionada de las cosas únicas y especiales, decidí fundar Los complementos de Susanita, un espacio donde cada pieza nace sin guion, surgiendo directamente de mi imaginación y de mis manos.</p>
                        </div>
                        <div class="bio-image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tia-susanita.png" alt="Susanita tejiendo" class="bio-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ganchillo -->
        <section id="ganchillo" class="section bg-light">
            <div class="container">
                <h2>El arte del ganchillo</h2>
                <div class="two-columns">
                    <div class="column-text">
                        <p>Algunas colecciones aparecen como un suspiro, otras vuelven... o no, quién sabe.</p>
                        <p>No sigo calendarios. Creo, diseño y comparto pensando en quienes valoran lo hecho con dedicación.</p>
                        <p>Como amante de los animales y orgullosa dog lover, muchas de mis creaciones nacen de esa ternura juguetona que ellos saben inspirar.</p>
                    </div>
                    <div class="column-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ganchillo-proceso.png" alt="Proceso de ganchillo" class="process-img">
                    </div>
                </div>
            </div>
        </section>

        <!-- Hecho a mano -->
        <section id="hecho-mano" class="section">
            <div class="container">
                <h2 class="ganchillo">Hecho a mano</h2>
                <div class="features-grid">
                    <div class="feature-card"><div class="feature-icon">🧶</div><h3>Originalidad absoluta</h3><p>No repito patrones, cada creación es una pieza irrepetible.</p></div>
                    <div class="feature-card"><div class="feature-icon">✂️</div><h3>Personalización</h3><p>Muchas piezas pueden adaptarse a tu estilo, medida o gusto.</p></div>
                    <div class="feature-card"><div class="feature-icon">🌱</div><h3>Crecimiento natural</h3><p>Algunas colecciones son efímeras, otras regresan cuando lo siento.</p></div>
                    <div class="feature-card"><div class="feature-icon">🧵</div><h3>Materiales seleccionados</h3><p>Siempre pensando en suavidad, comodidad y durabilidad.</p></div>
                </div>
                <div class="sobre-mi-glass handmade-quote">
                    <p class="ganchillo">"Lo artesanal no es solo un método, es un estilo de vida. Me ayuda a reconectar con la creatividad, experimentar, explorar nuevas técnicas... y, al final, lo mejor es compartirlo. Tejo para ti, para esos momentos pequeños y especiales que hacen grandes recuerdos."</p>
                </div>
            </div>
        </section>

        <!-- Dog Lover -->
        <section id="dog-lover" class="section bg-light">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Bolsos con Alma Canina</h2>
                    <div class="section-divider">
                        <span class="divider-line"></span><span class="divider-icon">🐾</span><span class="divider-line"></span>
                    </div>
                    <p class="section-intro">Como amante de los animales y orgullosa dog lover, muchas de mis creaciones nacen de esa ternura juguetona que ellos saben inspirar.</p>
                </div>

                <!-- Carrusel: Mis creaciones -->
                <div class="carousel-section">
                    <h3>Mis creaciones</h3>
                    <div class="carousel-container product-carousel">
                        <?php
                        $product_images = [
                            ['bolso-perro-1.png', 'Bolso Golden - Lana ecológica'],
                            ['bolso-perro-2.png', 'Bolso Dachshund - Algodón orgánico'],
                            ['bolso-perro-3.png', 'Bolso Labrador - Patchwork reciclado'],
                            ['bolso-perro-4.png', 'Bolso Bulldog - Lana km 0'],
                            ['bolso-perro-5.jpeg', 'Bolso Pack Canino - Técnica mixta'],
                        ];
                        foreach ($product_images as $img) {
                            echo '<div class="carousel-slide">';
                            echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/' . $img[0] . '" alt="' . esc_attr($img[1]) . '" class="carousel-image">';
                            echo '<div class="carousel-caption">' . esc_html($img[1]) . '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div class="carousel-controls">
                        <button class="carousel-prev">❮</button>
                        <button class="carousel-next">❯</button>
                    </div>
                </div>

                <!-- Carrusel: Lifestyle -->
                <div class="carousel-section">
                    <h3>En su vida cotidiana</h3>
                    <div class="carousel-container lifestyle-carousel">
                        <?php
                        $lifestyle_images = [
                            ['lifestyle-1.png', 'María en el parque con su bolso Golden'],
                            ['lifestyle-2.png', 'JuanCarlo disfrutando su café'],
                            ['lifestyle-3.png', 'Luisa en el mercado local'],
                            ['lifestyle-4.png', 'Paseo playero con Carla'],
                            ['lifestyle-5.jpg', 'Amigas que comparten amor por los perros'],
                        ];
                        foreach ($lifestyle_images as $img) {
                            echo '<div class="carousel-slide">';
                            echo '<img src="' .get_stylesheet_directory_uri(). '/assets/img/' . $img[0] . '" alt="' . esc_attr($img[1]) . '" class="carousel-image">';
                            echo '<div class="carousel-caption">' . esc_html($img[1]) . '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div class="carousel-controls">
                        <button class="carousel-prev">❮</button>
                        <button class="carousel-next">❯</button>
                    </div>
                </div>

                <!-- Sostenibilidad -->
                <div class="sustainability-section">
                    <div class="sustainability-card">
                        <div class="eco-icon">🌿</div>
                        <h3>Artesanía con alma</h3>
                        <p>Cada bolso nace en mi taller, punto a punto, con técnicas tradicionales como el crochet, la costura creativa y el patchwork.</p>
                    </div>
                    <div class="sustainability-card">
                        <div class="eco-icon">♻️</div>
                        <h3>Materiales sostenibles</h3>
                        <p>Trabajo con materiales locales y ecológicos: lanas naturales, encajes recuperados, algodón orgánico.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Otros contenidos futuros aquí... -->

    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Susanita Urban. Todos los derechos reservados.</p>
        </div>
    </footer>

<?php get_footer(); ?>