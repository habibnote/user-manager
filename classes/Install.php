<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Trait\Hook;

class Install {

    use Hook;

    public function __construct() {
        $this->action( 'init', [ $this, 'init' ] );
        $this->activation( [ $this, 'bootstrapping' ] );
    }

    public function bootstrapping() {

        if( ! $this->is_database_up_to_date() ) {
            $this->create_page();
            $this->update_db_version(); 
        }
    }

    /**
     * Create database table.
     */
    public function create_page() {
        // Create pages for login and registration
        $creatable_pages = [
            [
                'post_title'   => 'Login',
                'post_content' => '[um_login]',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ],
            [
                'post_title'   => 'Registration',
                'post_content' => '[um_registration]',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ],
            [
                'post_title'   => 'Dashboard',
                'post_content' => '[um_dashboard]',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ]

        ];
        
        foreach( $creatable_pages as $page ) {
            wp_insert_post( $page );
        }
    }

    /**
	 * Check if the database is up to date.
	 *
	 * @return bool
	 */
	private function is_database_up_to_date() {
		$installed_ver = get_option( 'UM_version' );
		return version_compare( $installed_ver, UM_VERSION, '=' );
	}

    /**
    * Update or add the database version to the options table.
    */
    private function update_db_version() {
        update_option( 'UM_version', UM_VERSION );
    }
}