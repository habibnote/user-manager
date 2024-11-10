<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Classes\Helper;

class Shortcode {

    /**
     * User Login Form
     */
    public function login() {
        Helper::get_template( 'user/login-form.php' );
    }

    /**
     * User Registration Form
     */
    public function registration() {
        Helper::get_template( 'user/registration-form.php' );
    }

    /**
     * User dashboard
     */
    public function dashboard() {
        ?>
            <h1>User Dashboard</h1>
        <?php
    } 
}