<?php
/**
 * Functions
 *
 * @package donden
 */

/**
 * Should locale be swapped?
 *
 * @param string $locale
 * @return bool
 */
function donden_should_swap( $locale ) {
	list( $lang ) = explode( '_', $locale );
	return in_array( $lang, donden_swappable_lang_list() );
}

/**
 * Get lang list to be swapped.
 *
 * @return string[]
 */
function donden_swappable_lang_list() {
	/**
	 * donden_swappable_lang_list
	 *
	 * List of langs to be swapped.
	 *
	 * @param  string[] @langs Lang codes. Default [].
	 * @return string[]
	 */
	return apply_filters( 'donden_swappable_lang_list', [
		'hu', // Hungarian
		'ja', // Japanese
		'ko', // Korean
		'mn', // Mongolian
		'vi', // Vietnamese
		'zh', // Chinese,
	] );
}
