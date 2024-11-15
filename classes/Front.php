<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Trait\Hook; 

class Front {

    use Hook;

    public function __construct() {
        $shortcode = new Shortcode();

        $this->action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        $this->shortcode( 'um_login', [ $shortcode, 'login' ] );
        $this->shortcode( 'um_registration', [ $shortcode, 'registration' ] );
        $this->shortcode( 'um_registration', [ $shortcode, 'registration' ] );
        $this->shortcode( 'um_dashboard', [ $shortcode, 'dashboard' ] );
    }

    public function enqueue_assets() {
        wp_enqueue_style( 'front', UM_ASSET . '/front/css/front.css', '', UM_VERSION, 'all' );
    }
}