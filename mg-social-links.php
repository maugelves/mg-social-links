<?php
/*
Plugin Name: MG Social Links
Plugin URI:  https://developer.wordpress.org/plugins/mg-social-links/
Description: Edit your Social Network links in the theme appearance
Version:     1.0
Author:      Mauricio Gelves
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mgss
Domain Path: /languages
*/

function mg_social_links_font(){
    wp_enqueue_style( 'mg-fontawesome', plugins_url('css/font-awesome.min.css', __FILE__) , array(), 1.0 );
}
add_action( 'wp_enqueue_scripts', 'mg_social_links_font' );


/**
 * Display the Social Links
 */
function mg_social_links(){
    ?>
    <div class="mg-social-links">
        <?php $url = get_theme_mod( 'mg_social_twitter' ); ?>
        <?php if( !empty( $url ) ): ?>
        <a class="mgss__twitter mgsl__item" rel="me" title="<?php echo bloginfo('name'); ?> en Twitter" href="<?php echo $url; ?>"><i class="fa fa-twitter"></i></a>
        <?php endif; ?>

        <?php $url = get_theme_mod( 'mg_social_tumblr' ); ?>
        <?php if( !empty( $url ) ): ?>
        <a class="mgss__tumblr mgsl__item" rel="me" title="<?php echo bloginfo('name'); ?> en Tumblr" href="<?php echo $url; ?>"><i class="fa fa-tumblr"></i></a>
        <?php endif; ?>

        <?php $url = get_theme_mod( 'mg_social_facebook' ); ?>
        <?php if( !empty( $url ) ): ?>
        <a class="mgss__facebook mgsl__item" rel="me" title="<?php echo bloginfo('name'); ?> en Facebook" href="<?php echo $url; ?>"><i class="fa fa-facebook"></i></a>
        <?php endif; ?>

        <?php $url = get_theme_mod( 'mg_social_linkedin' ); ?>
        <?php if( !empty( $url ) ): ?>
        <a class="mgss__linkedin mgsl__item" rel="me" title="<?php echo bloginfo('name'); ?> en Linkedin" href="<?php echo $url; ?>"><i class="fa fa-linkedin"></i></a>
        <?php endif; ?>

        <?php $url = get_theme_mod( 'mg_social_instagram' ); ?>
        <?php if( !empty( $url ) ): ?>
            <a class="mgss__instagram mgsl__item" rel="me" title="<?php echo bloginfo('name'); ?> en Linkedin" href="<?php echo $url; ?>"><i class="fa fa-instagram"></i></a>
        <?php endif; ?>

    </div>
    <?php
}


add_action('customize_register','mg_customize_social_links');
function mg_customize_social_links( $wp_customize ) {

    $wp_customize->add_section( 'mg_social_links', array(
        'title'         => __( 'Enlaces y configuración social', 'mgss' ),
        'description'   => __( 'Enlaces y configuración social', 'mgss' ),
        'priority'      => 130
    ) );

    $wp_customize->add_setting( 'mg_social_facebook', array( ) );
    $wp_customize->add_setting( 'mg_social_instagram', array( ) );
    $wp_customize->add_setting( 'mg_social_linkedin', array( ) );
    $wp_customize->add_setting( 'mg_social_tumbler', array( ) );
    $wp_customize->add_setting( 'mg_social_twitter', array( ) );


    $wp_customize->add_control( 'mg_social_facebook_control', array(
        'label' => __( 'Facebook URL' ),
        'type' => 'text',
        'section' => 'mg_social_links',
        'settings' => 'mg_social_facebook'
    ) );

    $wp_customize->add_control( 'mg_social_instagram_control', array(
        'label' => __( 'Instagram URL' ),
        'type' => 'text',
        'section' => 'mg_social_links',
        'settings' => 'mg_social_instagram'
    ) );

    $wp_customize->add_control( 'mg_social_tumblr_control', array(
        'label' => __( 'Tumblr URL' ),
        'type' => 'text',
        'section' => 'mg_social_links',
        'settings' => 'mg_social_tumbler'
    ) );

    $wp_customize->add_control( 'mg_social_twitter_control', array(
        'label' => __( 'Twitter URL' ),
        'type' => 'text',
        'section' => 'mg_social_links',
        'settings' => 'mg_social_twitter'
    ) );

    $wp_customize->add_control( 'mg_social_linkedin_control', array(
        'label' => __( 'Linkedin URL' ),
        'type' => 'text',
        'section' => 'mg_social_links',
        'settings' => 'mg_social_linkedin'
    ) );

}