<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php // Responsive Active
$cosgrove_viewport = cs_get_option('theme_responsive');
if($cosgrove_viewport == 'on') { ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } // Responsive

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(COSGROVE_IMAGES); ?>/favicon.ico" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$cosgrove_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($cosgrove_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($cosgrove_all_element_color); ?>">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
// Metabox
global $post;
$cosgrove_id    = ( isset( $post ) ) ? $post->ID : false;
$cosgrove_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $cosgrove_id;
$cosgrove_id    = ( cosgrove_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $cosgrove_id;
$cosgrove_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $cosgrove_id : false;
$cosgrove_meta  = get_post_meta( $cosgrove_id, 'page_type_metabox', true );

// Parallax
$cosgrove_bg_parallax = cs_get_option('theme_bg_parallax');
$cosgrove_hav_parallax = $cosgrove_bg_parallax ? ' parallax-window' : '';
$cosgrove_parallax_speed = cs_get_option('theme_bg_parallax_speed');
$cosgrove_bg_parallax_speed = $cosgrove_parallax_speed ? $cosgrove_parallax_speed : '0.4';

// Header Style
if ($cosgrove_meta) {
  $cosgrove_header_design  = $cosgrove_meta['select_header_design'];
  $cosgrove_sticky_header  = $cosgrove_meta['sticky_header'];
  $cosgrove_search_icon    = $cosgrove_meta['search_icon'];
  $cosgrove_cart_widget    = $cosgrove_meta['cart_widget'];
  $book_btn_type    = $cosgrove_meta['book_btn_type'];
  $book_button_text    = $cosgrove_meta['book_button_text'];
  $book_button_link    = $cosgrove_meta['book_button_link'];
  $pop_form_id    = $cosgrove_meta['pop_form_id'];
} else {
  $cosgrove_header_design  = cs_get_option('select_header_design');
  $cosgrove_sticky_header  = cs_get_option('sticky_header');
  $cosgrove_search_icon    = cs_get_option('search_icon');
  $cosgrove_cart_widget    = cs_get_option('cart_widget');
  $book_btn_type    = cs_get_option('book_btn_type');
  $book_button_text    = cs_get_option('book_button_text');
  $book_button_link    = cs_get_option('book_button_link');
  $pop_form_id    = cs_get_option('pop_form_id');
}
if ($cosgrove_header_design === 'default') {
  $cosgrove_header_design_actual  = cs_get_option('select_header_design');
} else {
  $cosgrove_header_design_actual = ( $cosgrove_header_design ) ? $cosgrove_header_design : cs_get_option('select_header_design');
}
if ($cosgrove_meta && $cosgrove_header_design !== 'default') {
  $cosgrove_sticky_header  = $cosgrove_meta['sticky_header'];
  $cosgrove_search_icon    = $cosgrove_meta['search_icon'];
  $cosgrove_cart_widget    = $cosgrove_meta['cart_widget'];
  $book_btn    = $cosgrove_meta['book_btn'];
  $book_btn_type    = $cosgrove_meta['book_btn_type'];
  $book_button_text    = $cosgrove_meta['book_button_text'];
  $book_button_link    = $cosgrove_meta['book_button_link'];
  $pop_form_id    = $cosgrove_meta['pop_form_id'];
} else {
  $cosgrove_sticky_header  = cs_get_option('sticky_header');
  $cosgrove_search_icon    = cs_get_option('search_icon');
  $cosgrove_cart_widget    = cs_get_option('cart_widget');
  $book_btn    = cs_get_option('book_btn');
  $book_btn_type    = cs_get_option('book_btn_type');
  $book_button_text    = cs_get_option('book_button_text');
  $book_button_link    = cs_get_option('book_button_link');
  $pop_form_id    = cs_get_option('pop_form_id');
}
if ($cosgrove_header_design_actual === 'style_two') {
  $cosgrove_header_class = 'navigation-style-two';
  $header_style_cls = ' header-style-two';
} else {
  $cosgrove_sticky_header_class = '';
  $cosgrove_header_class = '';
  $header_style_cls = ' header-style-one';

}
$cosgrove_sticky_header_class = $cosgrove_sticky_header ? ' csgve-sticky' : '';
$book_button_text = $book_button_text ? $book_button_text : esc_html__('Book An Appointment', 'cosgrove');

// Header Transparent
if ($cosgrove_meta) {
  // Shortcode Banner Type
  $cosgrove_banner_type = ' '. $cosgrove_meta['banner_type'];
} else {$cosgrove_banner_type = ''; }

wp_head();
?>
</head>
<body <?php body_class(); ?>>

<div class="csgve-main-wrap <?php echo esc_attr($cosgrove_header_class); ?>"> <!-- #vtheme-wrapper -->

  <?php get_template_part( 'layouts/header/top', 'bar' );
  // Header
  if ($cosgrove_header_design_actual === 'style_two') { ?>
  <header class="csgve-header <?php echo esc_attr($header_style_cls); ?> <?php echo esc_attr($cosgrove_banner_type); ?>">
  <?php } else { ?>
  <header class="csgve-header <?php echo esc_attr($cosgrove_sticky_header_class. $header_style_cls); ?> <?php echo esc_attr($cosgrove_banner_type); ?>">
  <?php } ?>
    <div class="container">

  <?php
  if ($cosgrove_meta) {
    $cosgrove_hide_header = $cosgrove_meta['hide_header'];
  } else { $cosgrove_hide_header = ''; }

  // Header Style
  if ($cosgrove_meta && $cosgrove_header_design !== 'default') {
    $cosgrove_address_info  = $cosgrove_meta['header_address_info'];
  } else {
    $cosgrove_address_info  = cs_get_option('header_address_info');
  }

  if (!$cosgrove_hide_header) { // Hide Header - Metabox
    get_template_part( 'layouts/header/logo' );
    ?>
    <div class="header-right col-md-9">
    <div class="csgve-nav-bar-section pull-right">
      <a href="javascript:void(0);" class="csgve-toggle"><span class="toggle-separator"></span></a>
      <?php // Brand Logo
      if ($cosgrove_header_design_actual === 'style_two') {
        echo do_shortcode($cosgrove_address_info);
      } else {
        get_template_part( 'layouts/header/menu', 'bar' );
        if($cosgrove_cart_widget){
          get_template_part( 'layouts/header/header', 'cart' );
        }
        if($cosgrove_search_icon){
          get_template_part( 'layouts/header/header', 'search' );
        }
        if($book_btn) {
          if ($book_button_link || $pop_form_id) {
            if ($book_btn_type === 'popup') {
              echo '<div class="header-btn"><a href="javascript:void(0);" data-toggle="modal" data-target="#'.esc_attr($pop_form_id).'" class="csgve-btn">'.esc_attr($book_button_text).'</a></div>';
            } else {
              if($book_button_link) {
                echo '<div class="header-btn"><a href="'.esc_url( $book_button_link ).'" class="csgve-btn sg-popup-id-4374"">'.esc_attr($book_button_text).'</a></div>';
              }
            }
          }
        }
      } ?>
    </div><div class="nabh-logo pull-right">
			<img src="http://chellaram.majorbrains.org/wp-content/uploads/2018/10/nabh-1.png" class="nabh-logo" style="text-align:right;padding-bottom:9px;padding-right: 40px">
		</div><div class="csgve-emergency-kbd  pull-right" style="text-align:right;">
			     
				<kbd><a href="tel:020 66839 777" style="font-size:12px;text-align: right"><i class="fa fa-phone" aria-hidden="true"></i></a></kbd>
			
			
		</div>
    </div><?php
    } // Hide Header - Metabox
    ?>
  </div>

  <?php if (!$cosgrove_hide_header) { // Hide Header - Metabox
    // Navigation Style Two
    if ($cosgrove_header_design_actual === 'style_two') { ?>
      <!-- Csgve Navigation Wrap -->
      <div class="csgve-navigation-wrap <?php echo esc_attr($cosgrove_sticky_header_class. $header_style_cls); ?>">
        <div class="container"><?php
          get_template_part( 'layouts/header/menu', 'bar' );
          if($cosgrove_cart_widget){
            get_template_part( 'layouts/header/header', 'cart' );
          }
          if($cosgrove_search_icon){
            get_template_part( 'layouts/header/header', 'search' );
          }
          if($book_btn) {
            if ($book_button_link || $pop_form_id) {
              if ($book_btn_type === 'popup') {
                echo '<div class="header-btn"><a href="javascript:void(0);" data-toggle="modal" data-target="#'.esc_attr($pop_form_id).'" class="csgve-btn">'.esc_attr($book_button_text).'</a></div>';
              } else {
                if($book_button_link) {
                  echo '<div class="header-btn"><a href="'.esc_url( $book_button_link ).'" class="csgve-btn sg-popup-id-4374">'.esc_attr($book_button_text).'</a></div>';
                }
              }
            }
          }
          ?>
        </div>
      </div>
     <?php
    } else {}
  } // Hide Header - Metabox
    ?>
     </header>
    <?php
    if ( function_exists( 'cosgrove_popup_form' ) ) {
      echo cosgrove_popup_form();
    }
  // Title Area
  $cosgrove_need_title_bar = cs_get_option('need_title_bar');
  get_template_part( 'layouts/header/title', 'bar' );