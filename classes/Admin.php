<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Trait\Hook;

class Admin {

    Use Hook;

    public function __construct() {
        $this->action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_assets' ] );
        $this->action( 'add_meta_boxes', [$this, 'add_meta_box'] );
        $this->action( 'save_post', [$this, 'save_meta'] );
    }

    public function admin_enqueue_assets( $screen ) {

    }

    public function add_meta_box() {
        add_meta_box(
            'um_product_price',              
            __( 'Product Info', 'u-manager' ),               
            [$this, 'product_meta_info_callback'],     
            'um_product',                
            'normal',                        
            'high'
        );
    }

    public function product_meta_info_callback( $post ) {
        $um_pirce = get_post_meta( $post->ID, 'um-price', true );
        wp_nonce_field( 'um-nonce', 'wpnonce' );
        ?>
            <div>
                <p>
                    <label for="um-price">Price:</label>
                    <input type="number" id="um-price" name="um-price" value="<?php esc_html_e( $um_pirce ); ?>">
                </p>
            </div>
        <?php
    }

    public function save_meta( $post_id ) {

        $um_nonce = isset( $_POST['wpnonce'] ) ? $_POST['wpnonce'] : '';
        $um_price = isset( $_POST['um-price'] ) ? $_POST['um-price'] : '';

        if( !is_secured( $post_id, $um_nonce, 'um-nonce' ) ) {
            return $post_id;    
        }

        update_post_meta( $post_id, 'um-price', $um_price );
    }
}