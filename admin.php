<?php

function sc_social_connect_admin_menu()
{
  add_menu_page('Social Connect Settings', 'Social Connect', 'manage_options', 'social-connect-id', 'sc_render_social_connect_settings');
  add_submenu_page('social-connect-id', 'Settings', 'Settings', 'manage_options', 'social-connect-id', 'sc_render_social_connect_settings');
	add_submenu_page('social-connect-id','Diagnostics','Diagnostics','manage_options','social-connect-diagnostics-id','sc_render_social_connect_diagnostics');  
  add_action( 'admin_init', 'sc_register_social_connect_settings' );
}
add_action('admin_menu', 'sc_social_connect_admin_menu');

function sc_register_social_connect_settings()
{
  register_setting( 'social-connect-settings-group', 'social_connect_facebook_enabled');  
  register_setting( 'social-connect-settings-group', 'social_connect_facebook_api_key' );
  register_setting( 'social-connect-settings-group', 'social_connect_facebook_secret_key' );
  register_setting( 'social-connect-settings-group', 'social_connect_twitter_enabled');
  register_setting( 'social-connect-settings-group', 'social_connect_twitter_consumer_key');
  register_setting( 'social-connect-settings-group', 'social_connect_twitter_consumer_secret');
  register_setting( 'social-connect-settings-group', 'social_connect_liveid_enabled');    
  register_setting( 'social-connect-settings-group', 'social_connect_liveid_appid_key' );
  register_setting( 'social-connect-settings-group', 'social_connect_liveid_secret_key' );
  register_setting( 'social-connect-settings-group', 'social_connect_liveid_policy_url' );  
  register_setting( 'social-connect-settings-group', 'social_connect_google_enabled');      
  register_setting( 'social-connect-settings-group', 'social_connect_yahoo_enabled');      
  register_setting( 'social-connect-settings-group', 'social_connect_openid_enabled');    
  register_setting( 'social-connect-settings-group', 'social_connect_wordpress_enabled');    
}

function sc_render_social_connect_settings()
{
?>
<div class="wrap">
<h2>Social Connect Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'social-connect-settings-group' ); ?>

    <h3>Facebook Settings</h3>
	<p>To connect your site to Facebook, you need a Facebook Application. If you have already created one, please insert your API & Secret key below.</p>
	<p>Already registered? Find your keys in your <a target="_blank" href="http://www.facebook.com/developers/apps.php">Facebook Application List</a></li>
	<p>Need to register?</p>
	<ol>
	<li>Visit the <a target="_blank" href="http://www.facebook.com/developers/createapp.php">Facebook Application Setup</a> page</li>
	<li>Get the API information from the <a target="_blank" href="http://www.facebook.com/developers/apps.php">Facebook Application List</a></li>
	<li>Select the application you created, then copy and paste the API key & Application Secret from there.</li>
	</ol>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable?</th>
        <td>
          <input type="checkbox" name="social_connect_facebook_enabled" value="1" <?php checked(get_option('social_connect_facebook_enabled', 1), 1); ?> /><br/>
          Check this box to enable register/login using Facebook.
        </td>
        </tr>
        <tr valign="top">
        <th scope="row">API Key</th>
        <td><input type="text" name="social_connect_facebook_api_key" value="<?php echo get_option('social_connect_facebook_api_key'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Secret Key</th>
        <td><input type="text" name="social_connect_facebook_secret_key" value="<?php echo get_option('social_connect_facebook_secret_key'); ?>" /></td>
        </tr>
    </table>

    <h3>Twitter Settings</h3>
	<p>To offer login via Twitter, you need to register your site as a Twitter Application and get a <strong>Consumer Key</strong>, a <strong>Consumer Secret</strong>, an <strong>Access Token</strong> and an <strong>Access Token Secret</strong>.</p>
	<p>Already registered? Find your keys in your <a href="http://dev.twitter.com/apps">Twitter Application List</a></p>
	<p>Need to register? <a href="http://dev.twitter.com/apps/new">Register an Application</a> and fill the form with the details below:
	<ol>
		<li>Application Type: <strong>Browser</strong></li>
		<li>Callback URL: <strong><?php echo SOCIAL_CONNECT_PLUGIN_URL . '/twitter/callback.php'; ?></strong></li>
		<li>Default Access: <strong>Read &amp; Write</strong></li>
	</ol>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable?</th>
        <td>
          <input type="checkbox" name="social_connect_twitter_enabled" value="1" <?php checked(get_option('social_connect_twitter_enabled'), 1); ?> /><br/>
          Twitter integration requires the generation of dummy email addresses for authenticating users. <br/>
          Please check with your domain administrator as this may require changes to your mail server.
        </td>
        </tr>
        <tr valign="top">
        <th scope="row">Consumer Key</th>
        <td><input type="text" name="social_connect_twitter_consumer_key" value="<?php echo get_option('social_connect_twitter_consumer_key'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Consumer Secret</th>
        <td><input type="text" name="social_connect_twitter_consumer_secret" value="<?php echo get_option('social_connect_twitter_consumer_secret'); ?>" /></td>
        </tr>
    </table>

    <h3>Windows Live Settings</h3>
	<p>To offer login via Windows Live, you need to register your site as a Windows Live Application and get a <strong>Client ID</strong> and <strong>Secret</strong>.</p>
	<p>Already registered? Find your keys in your <a target="_blank" href="https://manage.dev.live.com/default.aspx">Windows Live Application List</a></p>
	<p>Need to register? <a target="_blank" href="https://manage.dev.live.com/AddApplication.aspx">Register an Application</a> and the fill the form with the details below. 
	<ol>
		<li>Application Type: <strong>Web application</strong></li>		
		<li>From the application you created, copy and paste the following details. Note that all fields are required. </li>
	</ol>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable?</th>
        <td>
          <input type="checkbox" name="social_connect_liveid_enabled" value="1" <?php checked(get_option('social_connect_liveid_enabled', 1), 1); ?> /><br/>
          Check this box to enable register/login using Windows Live ID.
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Client ID</th>
        <td><input type="text" name="social_connect_liveid_appid_key" value="<?php echo get_option('social_connect_liveid_appid_key'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Secret Key</th>
        <td><input type="text" name="social_connect_liveid_secret_key" value="<?php echo get_option('social_connect_liveid_secret_key'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Policy URL</th>
        <td><input type="text" name="social_connect_liveid_policy_url" value="<?php echo get_option('social_connect_liveid_policy_url'); ?>" /></td>
        </tr>
    </table>

    <h3>Google Settings</h3>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable?</th>
        <td>
          <input type="checkbox" name="social_connect_google_enabled" value="1" <?php checked(get_option('social_connect_google_enabled', 1), 1); ?> /><br/>
          Check this box to enable register/login using Google.
        </td>
        </tr>        
    </table>

    <h3>Yahoo Settings</h3>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable?</th>
        <td>
          <input type="checkbox" name="social_connect_yahoo_enabled" value="1" <?php checked(get_option('social_connect_yahoo_enabled', 1), 1); ?> /><br/>
          Check this box to enable register/login using Yahoo.
        </td>
        </tr>        
    </table>

    <h3>OpenID Settings</h3>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable?</th>
        <td>
          <input type="checkbox" name="social_connect_openid_enabled" value="1" <?php checked(get_option('social_connect_openid_enabled', 1), 1); ?> /><br/>
          Check this box to enable register/login using OpenID.
        </td>
        </tr>        
    </table>

    <h3>WordPress Settings</h3>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable?</th>
        <td>
          <input type="checkbox" name="social_connect_wordpress_enabled" value="1" <?php checked(get_option('social_connect_wordpress_enabled', 1), 1); ?> /><br/>
          Check this box to enable register/login using WordPress.
        </td>
        </tr>        
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div> <?php
}


function sc_render_social_connect_diagnostics() {
  $mcrypt_exists = false;
  $mhash_exists = false;  
  $live_id_enabled = false;

  if (get_option('social_connect_liveid_enabled', 0)) {
    $live_id_enabled = true;

    if (function_exists("mcrypt_decrypt")) {
      $mcrypt_exists = true;
    } else {
      update_option ('social_connect_liveid_enabled', 0);
    }

    if (function_exists("mhash")) {
      $mhash_exists = true;
    } else {
      update_option ('social_connect_liveid_enabled', 0);
    }    
  }
  
  ?>
  <div class="wrap">
  <h2>Social Connect Diagnostics</h2>
  <?php
  
  echo "
  <p><b>Windows Live ID: Checking for required <a href='http://php.net/manual/en/book.mhash.php' target='_blank' >mhash</a> and <a href='http://www.php.net/manual/en/book.mcrypt.php' target='_blank' >mcrypt</a> cryptographic extensions.</b></p>
  <p>If you are not using Windows Live ID, ignore this diagnostic.</p> <br />
  ";
  
  if (!$mcrypt_exists || !$mhash_exists) {
    if (!$mcrypt_exists) {
      echo "
      <p>Windows Live ID requires the mcrypt extension. You do not seem to have this installed. Please install this extension or ask your service provider to install it.<br /><br />Diagnostics has disabled Windows Live integration for Social Connect for now. Once you install the extension, enable Windows Live ID through the settings page and then run this diagnostic again.</p><br />
      ";
    } 

    if(!$mhash_exists) {
      echo "
      <p>Windows Live ID requires the mhash extension. You do not seem to have this installed. Please install this extension or ask your service provider to install it.<br /><br />Diagnostics has disabled Windows Live integration for Social Connect for now. Once you install the extension, enable Windows Live ID through the settings page and then run this diagnostic again.</p><br />
      ";
    }      
  } else {
    echo "
    <p>Required mcrypt and mhash extensions are installed.</p><br />
    ";
  }
  echo "
  <p><b>Checking for server re-write rules.</b></p>
  ";
  echo "
  <p>Click on the link below to test if URL re-writing and query string parameter passing are setup correctly on your server. If you see a 'Test was successful' message after clicking the link then you are good to go. If you see a 404 error or some other error then you need to update re-write rules or ask your service provider to configure your server settings such that the below URL works correctly.<br /><br />
  <a href='" . SOCIAL_CONNECT_PLUGIN_URL . "/diagnostics/test.php?testing=http://www.example.com' target='_blank'>Test server redirection settings</a>
  </p>";
  ?>
  </div>
  <?php  
}
