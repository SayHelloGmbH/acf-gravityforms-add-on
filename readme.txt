=== Advanced Custom Fields: Gravity Forms Add-on ===
Contributors: markhowellsmead, dannyvanholten
Tags: gravity forms, form, acf, advanced custom fields, sayhellogmbh
Requires at least: 4.6
Tested up to: 7.0
Stable tag: 1.3.10
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Provides an Advanced Custom Field which allows a WordPress user to select a Gravity Form as part of a field group configuration.

== Description ==

Provides an Advanced Custom Field which allows a WordPress editorial user or administrator to select a Gravity Form as part of a field group configuration.

**This plugin does not have any effect on the frontend of the website. It does not output the form, nor does it modify the output of existing forms. The plugin only adds a custom ACF field type for use in an ACF field group.**

Full documentation can be found in the [plugin's GitHub Repository](https://github.com/SayHelloGmbH/acf-gravityforms-add-on/).

== Installation ==

The plugin is available from the [WordPress plugin repository](http://www.wordpress.org/plugins/acf-gravityforms-add-on)

1. Upload the plugin files to the `/wp-content/plugins/acf-gravityforms-add-on` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Add a new field of type 'Forms' to the required ACF field group.

You can also install Advanced Custom Fields: Gravity Forms Add-on using Composer from WPackagist.

`composer require wpackagist-plugin/acf-gravityforms-add-on`

== Screenshots ==

1. You can select 'Form' as a field type while adding an ACF Field.
2. The actual selection of the field.
3. You can select all your Gravity Forms.
4. If ACF or Gravity Forms is not added it will give a notice (Notices from [WP Growl Notifications](https://wordpress.org/plugins/wp-growl-notifications)).

== Development ==

Version 1.3.2 added a plain HTML filter to the output of the field. This filter is not applied to fields in ACF version 4.

`apply_filters('acf-gravityforms-add-on/field_html', string $field_html, array $field, string $field_options, string $multiple)`

== Changelog ==

= 1.3.10 =

= 1.3.9 =

* Confirm compatibility with ACF 6.9.0.

= 1.3.8 =
= 1.3.7 =
= 1.3.6 =

- Revise plugin meta, confirm compatibility with WordPress 6.5.3, revert translation slugs.

= 1.3.5 =

* Update readme, core version support and plugin requirement header. No functional changes.

= 1.3.4 =

* Update readme. No functional changes.

= 1.3.3 =

* Variable and hook naming, readme changes.

= 1.3.2 =

* Adds a filter to allow developers to modify the field HTML. This filter is not applied to fields in ACF version 4.

= 1.3.1 =

* Fixes fatal error by removing the Composer platform check.

= 1.3.0 =

* Sort list of available, selectable forms by title instead of ID.

= 1.2.11 =

* Avoid errors when using “show in REST”
* Add .editorconfig file to codebase. (No functionality for the website.)
* Bump "tested to" version number.

= 1.2.10 =

* Fix composer command typo. (Props @cezarpopa.)
* Update README and core version support number.

= 1.2.9 =

* Modify label for clarity in backend field selector.

= 1.2.8 =

* Move get_forms call out of constructor.

= 1.2.7 =

* Force-bump "tested to" version number in README.
* Re-format code.

= 1.2.6 =

* Fix visibility of `addNotices` function.

= 1.2.5 =

* Fix namespace in Field class.
* Use correct object property notation in Field class.
* Move addNotices into admin_init hook.
* Composer autoloader update.
* Add (dev) formatting ruleset file.

= 1.2.4 =

* Update version numbers.
* Update Composer installers.
* No functional changes.

= 1.2.3 =

* Fix GFAPI namespacing error.

= 1.2.2 =

* Move GFFormsModel::get_forms() out of constructor
* PHP Code beautify; composer update

= 1.2.1 =

* Changed the terminology of the return format
* Fixed broken Dutch translation for the error messages
* Fixed formatting issue on multi-select

= 1.2 =

* Added support for a return format in V4
* Improved coding by applying the improvements gathered through Code Climate.

= 1.1.1 =

* Fixed the preselecting of values because of a typehinting bug.
* Added admin notices to check if ACF & Gravity Forms are active

= 1.0.1 =

* Fixed a bug not causing the multiple option to render in ACF V4

= 1.0 =

* Changed names because of release on WordPress
* Documentation for WordPress

= 0.2 =

* Refactor the entire repo. Doesn't look the same at all anymore

= 0.1 =

* 2017-03-25
