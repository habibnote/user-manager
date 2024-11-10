<?php 
    if ( isset( $_POST['um_submit_registration'] ) ) {
            
        $name       = isset( $_POST['um_signup_name'] ) ? sanitize_text_field( $_POST['um_signup_name'] ) : '';
        $email      = isset( $_POST['um_signup_email'] ) ? sanitize_email( $_POST['um_signup_email'] ) : '';
        $country    = isset( $_POST['um_signup_country'] ) ?  sanitize_text_field( $_POST['um_signup_country'] ) : '';
        $password   = isset( $_POST['um_signup_password'] ) ?  sanitize_text_field( $_POST['um_signup_password'] ) : '';
        $confirm_password = isset( $_POST['um_signup_confirm_password'] ) ? sanitize_text_field( $_POST['um_signup_confirm_password'] ) : '';

        if ( empty( $name ) || empty( $email ) || empty( $password ) || empty( $confirm_password ) || $password !== $confirm_password ) {
            esc_html_e( 'Please fill in all fields correctly.', 'u-manager');
        }else {
            // Create the user
            $user_id = wp_create_user( $email, $password, $email );
            if ( ! is_wp_error( $user_id ) ) {
                
                wp_update_user( array( 'ID' => $user_id, 'display_name' => $name ) );
                update_user_meta( $user_id, 'country', $country );
    
                printf( "<script>window.location.href = '%s?user_id=%s';</script>", site_url('/dashboard'), $user_id );
    
            } else {
                echo 'Error: ' . $user_id->get_error_message();
            }
        }

    }
?>

<form method="POST">
    <p>
        <label for="um-signup-name">
            <?php esc_html_e( 'Name', 'u-manager' ); ?>
        </label>
        <input type="text" name="um_signup_name" id="um-signup-name" placeholder="Enter Your Name" required>
    </p>
    <p>
        <label for="um-signup-email">
            <?php esc_html_e( 'Email', 'u-manager' ); ?>
        </label>
        <input type="email" name="um_signup_email" id="um-signup-email" placeholder="Enter Your Email" required>
    </p>
    <p>
        <label for="um-signup-country">
            <?php esc_html_e( 'Country', 'u-manager' ); ?>
        </label>
        <?php echo country_dropdown( 'um-signup-country', 'um-signup-country' ); ?>
    </p>
    <p>
        <label for="um-signup-password">
            <?php esc_html_e( 'Password', 'u-manager' ); ?>
        </label>
        <input type="password" name="um_signup_password" id="um-signup-password" placeholder="Enter Your Password" required>
    </p>
    <p>
        <label for="um-signup-confirm-password">
            <?php esc_html_e( 'Confirm Password', 'u-manager' ); ?>
        </label>
        <input type="password" name="um_signup_confirm_password" id="um-signup-confirm-password" placeholder="Confirm Your Password" required>
    </p>
    <p>
        <button name="um_submit_registration" type="submit">
            <?php esc_html_e( 'Register', 'u-manager' ); ?>
        </button>
    </p>
</form>
