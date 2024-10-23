<?php
/*
 * Plugin Name:       User Manager
 * Plugin URI:          
 * Description:       
 * Version:           0.0.1
 * Requires PHP:      7.2
 * Author:            Md. Habib
 * Author URI:        https://me.habibnote.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       u-manager
 * Domain Path:       /languages
 */

namespace Habib\UserManager;    

if( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Plugin Main Class
 */
class PluginStructure {
    static $instance = false;

    /**
     * Class Constructor
     */
    private function __construct() {
        $this->include();
        $this->define();
        $this->hooks();
    }

     /**
     * Include all needed files
     */
    private function include() {
        require_once( dirname( __FILE__ ) . '/inc/functions.php' );
        require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
    }

    /**
     * define all constant
     */
    private function define() {
        define( "DEVS", true ); // 'true' | is development mode on

        define( 'UM_FILE', __FILE__ );
        define( 'UM_VERSION', '1.0' );
        define( 'UM_DIR', dirname( UM_FILE ) );
        define( 'UM_ASSET', plugins_url( 'assets', UM_FILE ) );
        define( 'UM_SPA', plugins_url( 'spa', UM_FILE ) );
        if( DEVS ) {
            define( 'ASSETS_VERSION', time() );
        }
        else {
            define( 'ASSETS_VERSION', UM_VERSION );
        }
    }

    /**
     * All hooks
     */
    private function hooks() {
        /**
         * Register the activation hook.
         * This hook is triggered when the plugin is activated.
         * It installs necessary database tables, sets initial seeds, 
         * and checks database versions.
         */
        new Classes\Install();

        /**
         * Register hooks for Admin end.
         * This hook is triggered only admin end.
         */
        if( is_admin() ) {
            new Classes\Admin();
        }
        /**
         * Register hooks for Front end.
         * This hook is triggered only front end.
         */
        if( ! is_admin() ) {
            new Classes\Front();
        }
        /**
         * Register hooks for Common.
         * This hook is triggered both admin & front also.
         */
        new Classes\Common();
    }

    /**
     * Singleton Instance
    */
    static function get_plugin() {
        
        if( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/**
 * Cick off the plugins 
 */
PluginStructure::get_plugin();