<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// Essentials
include_once 'includes/config.php';
include_once 'includes/init.php';

// Register & Functions
include_once 'includes/register.php';
include_once 'includes/actions.php';
include_once 'includes/filters.php';
include_once 'includes/func.php';
include_once 'includes/ratings.php'; 
// Customizer
include_once 'includes/customizer/customizer.php';
include_once 'includes/customizer/css.php';
include_once 'includes/vibe-menu.php';
include_once 'includes/notes-discussions.php';


if ( function_exists('bp_get_signup_allowed')) {
    include_once 'includes/bp-custom.php';
}

include_once '_inc/ajax.php';
include_once 'includes/buddydrive.php';
//Widgets
include_once('includes/widgets/custom_widgets.php');
if ( function_exists('bp_get_signup_allowed')) {
 include_once('includes/widgets/custom_bp_widgets.php');
}
if (function_exists('pmpro_hasMembershipLevel')) {
    include_once('includes/pmpro-connect.php');
}
include_once('includes/widgets/advanced_woocommerce_widgets.php');
include_once('includes/widgets/twitter.php');
include_once('includes/widgets/flickr.php');

//Misc
include_once 'includes/extras.php';
include_once 'includes/tincan.php';
include_once 'setup/wplms-install.php';

// Options Panel
get_template_part('vibe','options');

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Fee Description' );		// Rename the description tab
		

	return $tabs;

}

function my_text_strings( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
        case 'Coupon code' :
            $translated_text = __( 'Scholarship code', 'woocommerce' );
            break;
        case 'Apply Coupon' :
           $translated_text = __( 'Apply code', 'woocommerce' );
            break;
        case 'Coupon' :
           $translated_text = __( 'Scholarship', 'woocommerce' );
            break;
    }
    return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

add_filter( 'woocommerce_cart_totals_coupon_label', 'woocommerce_change_coupon_label' );
function woocommerce_change_coupon_label() {
    echo 'Scholarship';
}