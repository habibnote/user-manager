<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Trait\Hook; 

class Front {

    use Hook;

    public function __construct() {
        $this->action( 'wp_enqueue_scripts', [$this, 'enqueue_assets'] );
    }

    public function enqueue_assets() {
        
    }
}