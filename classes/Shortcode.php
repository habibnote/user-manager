<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Classes\Helper;

class Shortcode {

    /**
     * User Login Form
     */
    public function login() {
        if ( is_user_logged_in() ) {
            if ( is_page( 'login' ) ) {
               printf( "<script>window.location.href = '%s';</script>", site_url('/dashboard') );
            }
        } else {
            return Helper::get_template( 'user/login-form.php' );
        }
    }

    /**
     * User Registration Form
     */
    public function registration() {
        return Helper::get_template( 'user/registration-form.php' );
    }

    /**
     * User dashboard
     */
    public function dashboard() {
        return Helper::get_template( 'user/dashboard.php' );
    } 
}