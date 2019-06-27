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

/**
 * Swap user name fields on edit screen.
 *
 * @param array $address_fields
 * @param string $country
 *
 * @return array
 */
function donden_address_fields( $address_fields ) {
	if ( donden_should_swap( get_user_locale() ) ) {
			foreach ( [
				[ 'first_name', 20, 'last' ],
				[ 'last_name', 10, 'first' ],
			] as list( $key, $priority, $class_name ) ) {
				if ( isset( $address_fields[ $key ] ) ) {
					$address_fields[ $key ]['priority'] = $priority;
					$address_fields[ $key ]['class'][0] = "form-row-{$class_name}";
				}
			}
	}
	return $address_fields;
}
add_filter( 'woocommerce_default_address_fields', 'donden_address_fields', 10, 1 );

/**
 * Filter gettext for backward compats.
 *
 * @param string $translation
 * @param string $text
 * @param string $context
 * @param string $domain
 * @return string
 */
add_filter( 'gettext_with_context', function( $translation, $text, $context, $domain ) {
	if ( 'woocommerce' === $domain && donden_should_swap(get_user_locale() ) ) {
		switch ( $context ) {
			case 'display_name':
			case 'full_name':
				$translation = '%2$s %1$s';
				break;
		}
	}
	return $translation;
}, 10, 4 );
