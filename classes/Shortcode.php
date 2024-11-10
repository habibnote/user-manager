<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Classes\Helper;

class Shortcode {

    /**
     * User Login Form
     */
    public function login() {
        ob_start();
        wp_login_form();
        ?>
            <p>
                <a href="<?php echo wp_lostpassword_url(); ?>"><?php esc_html_e( 'Forgot Password?', 'u-manager' ); ?></a>
            </p>
        <?php
        return ob_get_clean();
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