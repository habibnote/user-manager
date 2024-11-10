<?php 

namespace Habib\UserManager\Classes;

class Helper {
	/**
	 * Method to getting template
	 */
	public static function get_template( $template, $args = array() ) {
		$path = UM_DIR . 'view/' . $template;
		
		if ( file_exists( $path ) ) {
			if ( ! empty( $args ) && is_array( $args ) ) {
				extract( $args );
			}

			ob_start();
			include $path;
			echo ob_get_clean();
		}
		else {
			error_log( 'Template file not found: ' . $path );
		}
	}

}