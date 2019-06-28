# Donden Gaeshi - Name Order Changer for WooCommerce

Contributors: Takahashi_Fumiki,kuno1  
Tags: woocommerce,i18n,l10n,localization,display_name  
Requires at least: 5.0  
Requires PHP: 7.0  
Tested up to: 5.2.2  
Stable tag: nightly
License: GPLv3 or later  
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Change the order of first_name and last_name in WooCommerce depends on user locale.

## Description

In some locales, last_name preceded first_name.

- Japanese `ja`
- Chinese `zh_*`
- Korean `ko`
- Mongolian `mn`
- Vietnamese `vi`
- Hungarian `hu_HU`

If current user locale is in the list above, name fields in WooCommerce will be swapped with this plugin.  
This plugin does nothing but changing name field's order. You don't have to care about side effects.

Currently fixes...

- My Account
- Billing Address & Shipping Address
- Order Email
- Default display name and full name

## Installation

1. Upload `donden-gaeshi` folder to the `/wp-content/plugins` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Now your name order will be suite for your locale.

## Customization

You can change locales with filter.

```
add_filter( 'donden_swappable_lang_list', function( $langs ) {
    // Add lang th.
    $langs[] = 'th';
    return $langs
} );
```

## Screenshots

1. Name fields in My Account page. Surname comes first.
2. Name fields in Builling Address is in the same order.
3. If user locale is not in the list above, the first name precedes the last name.

## Frequently Asked Questions

### How to Contribute

This plugin is hosted on [GitHub](https://github.com/kuno1/donden-gaeshi), feel free to make [issues](https://github.com/kuno1/donden-gaeshi/issues) or to send [Pull Requests](https://github.com/kuno1/donden-gaeshi/pulls). 

## Changelog

### 0.1.4

* Fix readme for clarification.

### 0.1.2

* Registered on WordPress.org.

### 0.1.0

* first Release.
