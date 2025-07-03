<?php
// Cargar estilos del tema padre y del hijo
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('storefront-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('storefront-child-style', get_stylesheet_uri(), ['storefront-style']);
});
add_filter( 'woocommerce_product_add_to_cart_text', 'cambiar_texto_boton_tienda' );
function cambiar_texto_boton_tienda() {
    return __( 'Añadir al carrito', 'woocommerce' );
}
