<?php 

    if( ! is_user_logged_in() ) {
        return;
    }

    $url = get_permalink(); 

    $dashboard_options = [
        [
            'title'     => __( 'New Order', 'u-manager' ),
            'status'    => 'new-order'
        ],
        [
            'title'     => __( 'My Service', 'u-manager' ),
            'status'    => 'my-service'
        ],
        [
            'title'     => __( 'Renew', 'u-manager' ),
            'status'    => 'renew'
        ],
        [
            'title'     => __( 'Earn', 'u-manager' ),
            'status'    => 'earn'
        ],
    ];

?>
<div class="um-user-dashboard-wrapper">
    <h1><?php esc_html_e( 'User Dashboard', 'u-manager' ) ?></h1>
    <nav class="um-navigation"> 
        <ul>
            <?php 
                foreach( $dashboard_options as $options ) {
                    printf( '<li><a href="%s">%s</a></li>', add_query_arg( 'um-status', $options['status'], $url ), $options['title'] );

                } 
                
                if( isset( $_GET['um-status'] ) ) {
                    foreach( $dashboard_options as $options ) {
                        if( ! empty( $_GET['um-status'] ) && $_GET['um-status'] == $options['status'] ) {
                            ob_start();
                            include UM_DIR.'view/dashboard/'.$options['status'].'.php' ;
                            echo ob_get_clean();
                        } 
                    }
                }
            ?>
        </ul>
    </nav>
</div>