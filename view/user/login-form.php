<?php wp_login_form(); ?>
<p>
    <a href="<?php echo wp_lostpassword_url(); ?>">
        <?php esc_html_e( 'Forgot Password?', 'u-manager' ); ?>
    </a>
</p>