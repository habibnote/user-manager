<?php 

namespace Habib\UserManager\Classes;

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
        
        ob_start();
        ?>
            <form action="">
                <p>
                    <label for="um-signup-name">Name</label>
                    <input type="text" id="um-signup-name" placeholder="Enter Your Name">
                </p>
                <p>
                    <label for="um-signup-email">Email</label>
                    <input type="email" id="um-signup-email" placeholder="Enter Your Email">
                </p>
                <p>
                    <label for="um-signup-country">Country</label>
                    <?php echo country_dropdown( 'um-country', 'um-signup-country' ) ?>
                </p>
                <p>
                    <label for="um-signup-password">Password</label>
                    <input type="password" id="um-signup-password" placeholder="Enter Your Password">
                </p>
                <p>
                    <label for="um-signup-confirm-password">Confirm Password</label>
                    <input type="password" id="um-signup-confirm-password" placeholder="Enter Your Confirm Password">
                </p>
                <p>
                    <button type="submit">Registration</button>
                </p>

            </form>
        <?php
        return ob_get_clean();
    }
}