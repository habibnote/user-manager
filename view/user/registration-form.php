<form method="POST" action="<?php echo site_url( '/dashboard' ); ?>">
    <p>
        <label for="um-signup-name">
            <?php esc_html_e( 'Name', 'u-manager' ); ?>
        </label>
        <input type="text" id="um-signup-name" placeholder="Enter Your Name">
    </p>
    <p>
        <label for="um-signup-email">
            <?php esc_html_e( 'Email', 'u-manager' ); ?>
        </label>
        <input type="email" id="um-signup-email" placeholder="Enter Your Email">
    </p>
    <p>
        <label for="um-signup-country">
            <?php esc_html_e( 'Country', 'u-manager' ); ?>
        </label>
        <?php echo country_dropdown( 'um-country', 'um-signup-country' ) ?>
    </p>
    <p>
        <label for="um-signup-password">
            <?php esc_html_e( 'Password', 'u-manager' ); ?>
        </label>
        <input type="password" id="um-signup-password" placeholder="Enter Your Password">
    </p>
    <p>
        <label for="um-signup-confirm-password">
            <?php esc_html_e( 'Confirm Password', 'u-manager' ); ?>
        </label>
        <input type="password" id="um-signup-confirm-password" placeholder="Enter Your Confirm Password">
    </p>
    <p>
        <button type="submit">
            <?php esc_html_e( 'Registration', 'u-manager' ); ?>
        </button>
    </p>

</form>