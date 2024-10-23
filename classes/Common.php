<?php 

namespace Habib\UserManager\Classes; 

use Habib\UserManager\Trait\Hook; 

class Common {

    use Hook;

    public function __construct() {
        $this->action( 'admin_enqueue_scripts', [$this, 'enqueue_assets'] );
        $this->action( 'wp_enqueue_scripts', [$this, 'enqueue_assets'] );
    }

    public function enqueue_assets() {
        
    }
}