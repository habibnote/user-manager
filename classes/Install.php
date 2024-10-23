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
        $login_page = array(
            'post_title'   => 'Login',
            'post_content' => '[um_login]',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        );
        $registration_page = array(
            'post_title'   => 'Registration',
            'post_content' => '[um_registration]',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        );

        // Insert pages into database
        wp_insert_post( $login_page );
        wp_insert_post( $registration_page );
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