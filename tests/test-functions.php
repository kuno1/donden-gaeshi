<?php

/**
 * Utilities test case
 * @package donden
 */
class FunctionsTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_lang() {
		$langs = donden_swappable_lang_list();
		$this->assertTrue( is_array( $langs ) );
	}
	
	/**
	 * Test locale detection.
	 */
	public function test_locale() {
		// Should be true.
		$this->assertTrue( donden_should_swap( 'ja' ) );
		$this->assertTrue( donden_should_swap( 'zh_HK' ) );
		$this->assertTrue( donden_should_swap( 'zh_TW' ) );
		$this->assertTrue( donden_should_swap( 'zh_CN' ) );
		$this->assertTrue( donden_should_swap( 'vi' ) );
		$this->assertTrue( donden_should_swap( 'hu_HU' ) );
		// Should be false.
		$this->assertFalse( donden_should_swap( 'en_US' ) );
		$this->assertFalse( donden_should_swap( 'fr_FR' ) );
	}
}
