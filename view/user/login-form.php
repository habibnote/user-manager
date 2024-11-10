<?php
if( isset( $_GET['singup'] ) ) {
    if( !empty( $_GET['singup'] ) && $_GET['singup'] === 'success' ) {
        printf( '<p>%s</p>', __( 'Your Account has been created successfuly Please Login with your email and password', 'u-manager' ) );
    }
}
wp_login_form(); ?>
<p>
    <a href="<?php echo wp_lostpassword_url(); ?>">
        <?php esc_html_e( 'Forgot Password?', 'u-manager' ); ?>
    </a>
</p>