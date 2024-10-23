<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Trait\Hook;

class Admin {

    Use Hook;

    public function __construct() {
        $this->action( 'admin_enqueue_scripts', [$this, 'admin_enqueue_assets'] );
    }

    public function admin_enqueue_assets( $screen ) {

    }

}