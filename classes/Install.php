<?php 

namespace Habib\UserManager\Classes;

use Habib\UserManager\Trait\Hook;

class Install {

    use Hook;

    public function __construct() {
        $this->activation( [$this, 'bootstrapping'] );
    }

    public function bootstrapping() {

        if( ! $this->is_database_up_to_date() ) {
            $this->create_table();
            $this->update_db_version(); 
        }
    }

    /**
     * Create database table.
     */
    public function create_table(): void {
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        // global $wpdb;

        // $db         = $wpdb;
        // $prefix     = $db->prefix . 'UM_';
        // $table_name = $prefix . 'sample';
        // $charset_collate = $db->get_charset_collate();

        // $sql = "CREATE TABLE {$table_name} (
        //     id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        //     title VARCHAR(255) NOT NULL,
        //     author VARCHAR(255) NOT NULL,
        //     PRIMARY KEY (id)
        // ) {$charset_collate};";

        // dbDelta($sql);
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