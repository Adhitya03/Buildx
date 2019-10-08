<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until end of header tag
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buildx
 * @since 1.0.0
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>

</head>
<body <?php body_class();?> >
<?php
wp_body_open();
?>
	<header>
        <section class="menu-area">
            <div class="main-menu col-12 col-md-12">
                <nav class="navbar navbar-expand-md" role="navigation">
                    <div class="container">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>

                        <div class="logo col-6">
                            <?php
                            the_custom_logo();
                            ?>
                            <div class="site-brand">
                                <div class="site-title">
                                    <?php
                                    if(get_theme_mod('header_text')){
                                        if( is_single() ){
                                            echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'.esc_attr( get_bloginfo( 'name' ) ).'"><h2 class="site-name">'.esc_html( get_bloginfo( 'name' ) ).'</h2></a>';
                                        }else{
                                            echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'.esc_attr( get_bloginfo( 'name' ) ).'"><h1 class="site-name">'.esc_html( get_bloginfo( 'name' ) ).'</h1></a>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="site-description">
                                    <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>

                    </div>
                </nav>
            </div>
        </section>
	</header>
