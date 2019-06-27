<?php
/**
 * Fix WooCommerce account page.
 *
 * @package
 */

/**
 * Store buffer.
 */
add_action( 'woocommerce_edit_account_form_start', function() {
	ob_start();
}, 1 );

/**
 * Change contents and flush buffer.
 */
add_action( 'woocommerce_edit_account_form_end', function() {
	$content = ob_get_contents();
	ob_end_clean();
	if ( donden_should_swap( get_user_locale() ) ) {
		// User may be 山田太郎.
		$first_name = '';
		$content = preg_replace_callback( '@<p (.*?)</p>@su', function( $matches ) use ( &$first_name ) {
			if ( false !== strpos( $matches[0], 'account_first_name' ) ) {
				// this is first name.
				$replaced = str_replace( 'row--first', 'row--last', $matches[0] );
				$replaced = str_replace( 'row-first', 'row-last', $replaced );
				$first_name = $replaced;
				return '';
			} elseif ( false !== strpos( $matches[0], 'account_last_name' ) ) {
				$replaced = str_replace( 'row--last', 'row--first', $matches[0] );
				$replaced = str_replace( 'row-last', 'row-first', $replaced );
				return $replaced . "\n" . $first_name;
			} else {
				return $matches[0];
			}
		}, $content );
	}
	echo $content;
	
}, 9999 );
