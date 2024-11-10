<?php $url = get_permalink(); ?>
<div class="um-user-dashboard-wrapper">
    <h1><?php esc_html_e( 'User Dashboard', 'u-manager' ) ?></h1>
    <nav class="um-navigation"> 
        <ul>
            <?php 
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
                foreach( $dashboard_options as $options ) {
                    printf( '<li><a href="%s">%s</a></li>', add_query_arg( 'status', $options['status'], $url ), $options['title'] );
                }   
            ?>
        </ul>
    </nav>
</div>