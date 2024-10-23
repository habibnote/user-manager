<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Trait\Hook; 

class Front {

    use Hook;

    public function __construct() {
        $shortcode = new Shortcode();

        $this->action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        $this->shortcode( 'um_login', [ $shortcode, 'login' ] );
    }

    public function enqueue_assets() {
        
    }
}