<?php $url = get_permalink(); ?>
<div class="um-user-dashboard-wrapper">
    <h1>User Dashboard</h1>
    <nav class="um-navigation"> 
        <ul>
            <?php 
                $dashboard_options = [
                    [
                        'title'     => 'New Order',
                        'status'    => 'new-order'
                    ],
                    [
                        'title'     => 'My Service',
                        'status'    => 'my-service'
                    ],
                    [
                        'title'     => 'Renew',
                        'status'    => 'renew'
                    ],
                    [
                        'title'     => 'Earn',
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