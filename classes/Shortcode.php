<?php 

namespace Habib\UserManager\Classes;

class Shortcode {
    public function login() {
        ob_start();
        ?>
            <form action="">
                <p>
                    <label for="um-login-email">Email</label>
                    <input type="email" id="um-login-email" placeholder="Enter Your Email">
                </p>
                <p>
                    <label for="um-login-password">Password</label>
                    <input type="email" id="um-login-password" placeholder="Enter Your Password">
                </p>
                <p>
                    <a href="#">Forget Password</a>
                </p>
                <p>
                    <button type="submit">Login</button>
                </p>

            </form>
        <?php
        return ob_get_clean();
    }

    public function registration() {
        ob_start();
        ?>
            
        <?php
        return ob_get_clean();
    }
}