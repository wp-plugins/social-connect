=== Social Connect ===
Contributors: thenbrent
Tags: facebook, wordpress.com, twitter, google, yahoo, social, login, register
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 0.9
License: GPLv2

Allow your visitors to comment, login and register with their Twitter, Facebook, Google, Yahoo or WordPress.com account. 

== Description ==

__This plugin is no longer actively developed or supported. Some connections still work, some don't. Use at your own risk. You have been warned.__

Social Connect adds social login buttons on the login, register and comment forms of your WordPress site.

The buttons offer login and registration using a Twitter, Facebook, Google, Yahoo or WordPress.com account.

It makes it super easy for new members to register with your site and existing members to login.

= Take Over Social Connect =

If you're a developer who wants to take over the Social Connect code base, make a pull request on the [Social Connect GitHub repository](https://github.com/thenbrent/social-connect).


== Installation ==

1. Upload everything into the "/wp-content/plugins/" directory of your WordPress site.
2. Activate in the "Plugins" admin panel.
3. Visit the "Settings | Social Connect" administration page to configure social media providers. 

== Frequently Asked Questions ==

= Does Social Connect work with WordPress Multisite? =

Yes.

= Does Social Connect work with the Theme My Login plugin? =

Yes.

= Can visitors connect with Social Connect to make a comment? =

Yes.

= Do I need to add template tags to my theme? =

Social Connect attempts to work with the default WordPress comment, login and registration forms.

If you want to add the social connect login or registration forms to another location in your theme, you can insert the following code in that location:

`<?php do_action( 'social_connect_form' ); ?>`

= What do I do if the Rewrite Diagnostics fail? =

If you get a 403 and 404 on the Rewrite Diagnostics test, please request your hosting provider whitelist your domain on mod_security. This problem has been encountered with **Host Gator* and **GoDaddy**.

For more information, see [Geodanny's](http://wordpress.org/support/profile/geodanny) kind responses in the forums to similar issues [here](http://wordpress.org/support/topic/plugin-social-connect-url-rewriting-and-query-string-parameter-passing) and [here](http://wordpress.org/support/topic/plugin-social-connect-url-rewrite).

= Where can I report bugs & get support? =

This plugin is no longer actively maintained or supported.

= Why doesn't Social Connect Work? =

Please make sure you are running the latest version of Social Connect and the latest version of WordPress.

If you have White Label CMS installed, the javascript it adds to your login page breaks all other plugins which run javascript on the login form.

For a quick fix and for more information see this [forum topic](http://wordpress.org/support/topic/social-connect-does-not-work-at-all?replies=7#post-2029255).

If you don't have White Label CMS installed, please double check your settings then post a question in the [Support Forums](http://wordpress.org/tags/social-connect?forum_id=10#postform). 

== Screenshots ==

1. **Login** - on the login and registration form, buttons for 3rd party services are provided.
2. **Comment** - buttons for 3rd party services are also provided on the comment form.

== Changelog ==

= 0.9 =
* Setting CURLOPT_SSL_VERIFYPEER to false

= 0.8 =
* Moving comments icons to top of comment form (using `comment_form_top` hook instead of `comment_form` hook)
* No longer relying on `file_get_contents()` function (using custom `sc_curl_get_contents()` function)
* Removing "Not You?" double-dialogue.
* Adding `social_connect_form` action to replace template tag with `do_action( 'social_connect_form' )`.

= 0.7 =
* Social Connect widget can now be customised
* l10n implemented
* Polish translation.

= 0.6 =
* Fixing 'email_exists' bug

= 0.5 =
* Removing Windows Live due to broken implementation
* Fixing IE7 Bug reported here: http://wordpress.org/support/topic/plugin-social-connect-social-connect-fails-on-ie7?replies=9
* Returning to a single admin page as diagnostics is smaller without Windows Live

= 0.4 =
* Removing generic OpenID for security concerns: http://wordpress.org/support/topic/545420
* Only calling deprecated registration.php file if WP < 3.1 http://wordpress.org/support/topic/540156

= 0.3 =
* Social Connect moved to it's own top level menu in wp-admin.
* Enable/disable integration with each social provider.
* Simplified setup for Windows Live.
* Introduced diagnostics to check for required cryptographic extensions and server rewrite rules.

= 0.2 =
* Fix for directory name

= 0.1 =
* Initial beta release. 

== Upgrade Notice ==

= 0.9 =
* Upgrade to fix Facebook connect SSL bug effecting some servers.

= 0.8 =
* Upgrade to fix bugs affecting Facebook connect on certain servers. 

= 0.7 =
* Upgrade to be able to customise Social Connect widget & use in Polish.

= 0.6 =
* Important Upgrade: If you are running WordPress 3.0, you must upgrade. For versions 3.1 and above, this is an optional upgrade.

= 0.5 =
Important upgrade to fix a bug in versions of Internet Explorer prior to version 8.
