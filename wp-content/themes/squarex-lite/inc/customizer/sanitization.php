<?php 
/**
 * Customizer: Sanitization Callbacks
 *
 * @package Squarex
 */


	/*-----------------------------------------------------------*
	 * Sanitize
	 *-----------------------------------------------------------*/
	function squarex_sanitize_textarea( $input ) {
		return wp_kses_post(force_balance_tags($input));
	}
	function squarex_sanitize_txt( $input ) {
		return sanitize_text_field( $input );
	}
	function squarex_sanitize_checkbox( $value ) {
	        if ( 'on' != $value )
	            $value = false;

	        return $value;
	}