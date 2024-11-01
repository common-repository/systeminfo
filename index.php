<?php 
/*
	Plugin Name: systeminfo
	plugin URI: https://wordpress.org/plugins/systeminfo/
	Description: This is a Simple plugin for check your wordpress website full system info.
	Version: 1.0.2
	Author: Prince Kapoor
	Tags: system info, Php information, system info
	Author URI: https://profiles.wordpress.org/jaslike
*/
wp_enqueue_style( 'systeminfo',plugins_url( 'css/plugin.css',__FILE__ ));
wp_enqueue_script( 'systeminfo', plugins_url( 'js/script.js', __FILE__ ), '', false, true );

add_action( 'admin_menu', 'systeminfo_menu' );
function systeminfo_menu() {
  add_options_page(
    'My Plugin Title',
    'Wp System Info',
    'manage_options',
    'wporg-plugin',
    'system_info_design'
  );
}
function system_info_design() { 
	$image_path=plugins_url().'/systeminfo/img/';
	global $wpdb;
?>
	<div class="outer">
		<div class="inner_container">
			<div class="organic-tabs">
				<ul>
				  <li><a href="#" id="post4" class="active-tab"><span class="info_tab">Webserver Configuration</a></li>
				  <li><a href="#" id="post3"><span class="info_tab">WordPress Configuration</a></li>
				  <li><a href="#" id="post7"><span class="info_tab">WordPress Uploads/Constants</a></li> 
				  <li><a href="#" id="post9"><span class="info_tab">Session Configuration</a></li> 
				  <li><a href="#" id="post8"><span class="info_tab">PHP Configuration</a></li>
				  <li><a href="#" id="post6"><span class="info_tab">PHP Extensions</a></li>
				  <li><a href="#" id="post1"><span class="info_tab">Apache info</a></li>
				  <li><a href="#" id="post2"><span class="info_tab">Site Info</a></li>
				  <li><a href="#" id="post5"><span class="info_tab">Plugins</a></li>
				  <li><a href="#" id="post10"><span class="info_tab">Wordpress Active Theme info</span></a></li>
				</ul>
			</div>
		<div class="organic-holder-outer">
		  <div id="post_dis1" class="post_inner">
		  		<div class="info_outer">
		  			<h3>Apache info</h3>
		  			<div class="table_outer">
		  				<?php $system_deatil=apache_request_headers();?>
		  				<table>
		  					<tr>
		  						<th>S.NO</th>
		  						<th colspan="2">Apache info</th>
		  					</tr>
		  					<tr>
		  						<td>1</td>
		  						<td>HOST</td>
		  						<td><?php echo $system_deatil['Host'];?></td>
		  					</tr>
		  					<tr>
		  						<td>2</td>
		  						<td>Connection</td>
		  						<td><?php echo $system_deatil['Connection'];?></td>
		  					</tr>
		  					<tr>
		  						<td>3</td>
		  						<td>Cache Control</td>
		  						<td><?php echo $system_deatil['Cache-Control'];?></td>
		  					</tr>
		  					<tr>
		  						<td>4</td>
		  						<td>User Agent</td>
		  						<td><?php echo $system_deatil['User-Agent'];?></td>
		  					</tr>
		  					<tr>
		  						<td>5</td>
		  						<td>Accept Language</td>
		  						<td><?php echo $system_deatil['Accept'];?></td>
		  					</tr>
		  					<tr>
		  						<td>6</td>
		  						<td>Accept Encoding</td>
		  						<td><?php echo $system_deatil['Accept-Encoding'];?></td>
		  					</tr>
		  					<tr>
		  						<td>7</td>
		  						<td>Accept Language</td>
		  						<td><?php echo $system_deatil['Accept-Language'];?></td>
		  					</tr>
		  				</table>
		  			</div>
		  		</div>
		  </div>
		  <div id="post_dis2" class="post_inner">
		  	<div class="info_outer">
		  		<h3>Site Info</h3>
		  		<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.NO</th>
		  					<th colspan="2">Site Info</th>
		  				</tr>
		  				<tr>
		  					<td>1</td>
		  					<td>Site URL</td>
		  					<td><?php echo site_url();?></td>
		  				</tr>
		  				<tr>
		  					<td>2</td>
		  					<td>Home URL</td>
		  					<td><?php echo home_url();?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>Multisite</td>
		  					<td><?php echo ( is_multisite() ? 'Yes' : 'No' );?></td>
		  				</tr>
		  			</table>
		  		</div>
		  	</div>
		  </div>
		  <div id="post_dis3" class="post_inner">
		  	<h3>WordPress Configuration</h3>
		  		<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.NO</th>
		  					<th colspan="2">WordPress Configuration</th>
		  				</tr>
		  				<tr>
		  					<td>1</td>
		  					<td>Wordpress Version</td>
		  					<td><?php echo get_bloginfo( 'version' );?></td>
		  				</tr>
		  				<tr>
		  					<td>2</td>
		  					<td>Wordpress Language</td>
		  					<td><?php echo ( defined( 'WPLANG' ) && WPLANG ? WPLANG : 'en_US' );?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>Permalink Structure</td>
		  					<td><?php echo ( get_option( 'permalink_structure' ) ? get_option( 'permalink_structure' ) : 'Default' );?></td>
		  				</tr>
		  				<tr>
		  					<td>4</td>
		  					<td>Active Theme</td>
		  					<td>
		  						<?php 
		  							$theme_data = wp_get_theme();
    								$theme      = $theme_data->Name . ' ' . $theme_data->Version;
		  							echo $theme;
		  						?>
		  					</td>
		  				</tr>
		  				<tr>
		  					<td>5</td>
		  					<td>Show On Front</td>
		  					<td><?php echo get_option( 'show_on_front' );?></td>
		  				</tr>
		  			</table>
		  		</div>
		  	</div>  
		  <div id="post_dis4" class="post_inner">
		  		<h3>Webserver Configuration</h3>
		  		<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.NO</th>
		  					<th colspan="2">Webserver Configuration</th>
		  				</tr>
		  				<tr>
		  					<td>1</td>
		  					<td>PHP Version</td>
		  					<td><?php echo PHP_VERSION ;?></td>
		  				</tr>
		  				<tr>
		  					<td>2</td>
		  					<td>MySQL Version</td>
		  					<td><?php echo $wpdb->db_version();?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>Webserver Info</td>
		  					<td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
		  				</tr>
		  			</table>
		  		</div>
		  	</div>
		  <div id="post_dis5" class="post_inner">
		  	<?php 
		  			$updates = get_plugin_updates();
		  			$new=1;
					$update_new = get_plugin_updates();
		  	?>
		  		<h3>Active Plugins</h3>
		  		<div class="table_outer">
		  			<table>
			  			<tr>
			  				<th>S.NO</th>
			  				<th>Plugin Name</th>
			  				<th>Version</th>
			  				<th>AuthorName</th>
			  			</tr>
			  			<?php 
			  				$count=1;
							$plugins = get_plugins();
							$active_plugins = get_option( 'active_plugins', array() );
			  				foreach ( $plugins as $plugin_path => $plugin ) {
			  				    if ( ! in_array( $plugin_path, $active_plugins, true ) ) {
							    continue;
							}
							$update = ( array_key_exists( $plugin_path, $updates ) ) ? ' (needs update - ' . $updates[ $plugin_path ]->update->new_version . ')' : '';
			  			?>
		  				<tr>
		  					<td><?php echo $count ; $count++;?></td>
		  					<?php
							    echo '<td>'.$plugin['Name'].'</td>';
							    echo '<td>'.$plugin['Version'].'</td>';
							    echo '<td>'.$plugin['AuthorName'].'</td>';
		  					?>
		  					
		  				</tr>
		  				<?php } ?>
		  			</table>
		  		</div>
		  		<br/>
		  		<h3>Inactive Plugins</h3>
		  		<div class="table_outer">
		  			<table>
			  			<tr>
			  				<th>S.NO</th>
			  				<th>Plugin Name</th>
			  				<th>Version</th>
			  				<th>AuthorName</th>
			  			</tr>
			  			<?php 
			  				$count=1;
							$plugins = get_plugins();
							$active_plugins = get_option( 'active_plugins', array() );
			  				foreach ( $plugins as $plugin_path => $plugin ) {
								if ( in_array( $plugin_path, $active_plugins ) ) {
								continue;
							}
							$update = ( array_key_exists( $plugin_path, $updates ) ) ? ' (needs update - ' . $updates[ $plugin_path ]->update->new_version . ')' : '';
			  			?>
		  				<tr>
		  					<td><?php echo $count ; $count++;?></td>
		  					<?php
							    echo '<td>'.$plugin['Name'].'</td>';
							    echo '<td>'.$plugin['Version'].'</td>';
							    echo '<td>'.$plugin['AuthorName'].'</td>';
		  					?>
		  					
		  				</tr>
		  				<?php } ?>
		  			</table>
		  		</div>
		  		<?php
		  			$updates_new = get_plugin_updates();
		  			if(count($updates_new) > 0){?>
		  		<br/>
		  	<h3>Required Updates</h3>
		  		<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.NO</th>
		  					<th>Plugin Name</th>
		  					<th>Current Version</th>
		  					<th>New Vesrion</th>
		  					<th>Author</th>
		  					<th>Update Now</th>
		  				</tr>
		  			<?php 
		  				foreach ($update_new as $update) {
		  					echo '<tr>'; ?>
		  					<td><?php echo $new ; ?></td>
		  					<?php 
		  						echo '<td>'.$update->Name.'</td>';
		  						echo '<td>'.$update->Version.'</td>';
		  						echo '<td>'.$update->update->new_version.'</td>';
		  						echo '<td>'.$update->Author.'</td>';
		  						echo '<td><a href='.get_site_url().'/wp-admin/plugins.php?plugin_status=upgrade'.' target="_blank">update</a></td>';
		  					echo '</tr>';
		  				$new++; }
		  			?>
		  			</table>
		  		</div>
		  		<?php }else{} ?>
			</div>
			 <div id="post_dis6" class="post_inner">
			 	<h3>PHP Extensions</h3>
			 	<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.No</th>
		  					<th colspan="2">PHP Extensions</th>
		  				</tr>
		  				<tr>
		  					<td>1</td>
		  					<td>cURL</td>
		  					<td><?php echo ( function_exists( 'curl_init' ) ? 'Supported' : 'Not Supported' );?></td>
		  				</tr>
		  				<tr>
		  					<td>2</td>
		  					<td>fsockopen</td>
		  					<td><?php echo ( function_exists( 'fsockopen' ) ? 'Supported' : 'Not Supported' );?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>SOAP Client</td>
		  					<td><?php echo ( class_exists( 'SoapClient' ) ? 'Installed' : 'Not Installed' );?></td>
		  				</tr>
		  				<tr>
		  					<td>4</td>
		  					<td>Suhosin</td>
		  					<td><?php echo ( extension_loaded( 'suhosin' ) ? 'Installed' : 'Not Installed' );?></td>
		  				</tr>
		  			</table>
			 	</div>
			 </div>
			 <div id="post_dis7" class="post_inner">
			 	<h3>WordPress Uploads/Constants</h3>
			 	<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.No</th>
		  					<th colspan="2">WordPress Uploads/Constants</th>
		  				</tr>
		  				<tr>
		  					<td>1</td>
		  					<td>WP_CONTENT_DIR</td>
		  					<td><?php echo ( defined( 'WP_CONTENT_DIR' ) ? WP_CONTENT_DIR ? WP_CONTENT_DIR : 'Disabled' : 'Not set' );?></td>
		  				</tr>
		  				<tr>
		  					<td>2</td>
		  					<td>WP_CONTENT_URL</td>
		  					<td><?php echo ( defined( 'WP_CONTENT_URL' ) ? WP_CONTENT_URL ? WP_CONTENT_URL : 'Disabled' : 'Not set' );?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>UPLOADS</td>
		  					<td><?php echo ( defined( 'UPLOADS' ) ? UPLOADS ? UPLOADS : 'Disabled' : 'Not set' );?></td>
		  				</tr>
		  				<?php $uploads_dir = wp_upload_dir();?>
		  				<tr>
		  					<td>4</td>
		  					<td>wp_uploads_dir() path</td>
		  					<td><?php echo $uploads_dir['path'];?></td>
		  				</tr>
		  				<tr>
		  					<td>5</td>
		  					<td>wp_uploads_dir() url</td>
		  					<td><?php echo $uploads_dir['url'];?></td>
		  				</tr>
		  				<tr>
		  					<td>6</td>
		  					<td>wp_uploads_dir() basedir</td>
		  					<td><?php echo $uploads_dir['basedir'];?></td>
		  				</tr>
		  				<tr>
		  					<td>7</td>
		  					<td>wp_uploads_dir() baseurl</td>
		  					<td><?php echo $uploads_dir['baseurl'];?></td>
		  				</tr>
		  			</table>
			 	</div>
			 </div>
			 <div id="post_dis8" class="post_inner">
			 	<h3>PHP Configuration</h3>
			 	<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.No</th>
		  					<th colspan="2">PHP Configuration</th>
		  				</tr>
		  				<tr>
		  					<td>1</td>
		  					<td>Memory Limit</td>
		  					<td><?php echo ini_get( 'memory_limit' );?></td>
		  				</tr>
		  				<tr>
		  					<td>2</td>
		  					<td>Upload Max Size</td>
		  					<td><?php echo ini_get( 'upload_max_filesize' );?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>Post Max Size</td>
		  					<td><?php echo ini_get( 'post_max_size' ) ;?></td>
		  				</tr>
		  				<tr>
		  					<td>4</td>
		  					<td>Upload Max Filesize</td>
		  					<td><?php echo ini_get( 'upload_max_filesize' );?></td>
		  				</tr>
		  				<tr>
		  					<td>5</td>
		  					<td>Time Limit</td>
		  					<td><?php echo ini_get( 'max_execution_time' );?></td>
		  				</tr>
		  				<tr>
		  					<td>6</td>
		  					<td>Max Input Vars</td>
		  					<td><?php echo ini_get( 'max_input_vars' ) ;?></td>
		  				</tr>
		  				<tr>
		  					<td>7</td>
		  					<td>Display Errors</td>
		  					<td><?php echo ( ini_get( 'display_errors' ) ? 'On (' . ini_get( 'display_errors' ) . ')' : 'N/A' ) ;?></td>
		  				</tr>
		  			</table>
		  		</div>
			 </div>
			 <div id="post_dis9" class="post_inner">
			 	<h3>Session Configuration</h3>
			 	<div class="table_outer">
		  			<table>
		  				<tr>
		  					<th>S.No</th>
		  					<th colspan="2">Session Configuration</th>
		  				</tr>
		  				<tr>
		  					<td>1</td>
		  					<td>Session</td>
		  					<td><?php echo ( isset( $_SESSION ) ? 'Enabled' : 'Disabled' );?></td>
		  				</tr>
		  				<?php if ( isset( $_SESSION ) ) { ?>
		  				<tr>
		  					<td>2</td>
		  					<td>Session Name</td>
		  					<td><?php echo esc_html( ini_get( 'session.name' ) );?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>Cookie Path</td>
		  					<td><?php echo esc_html( ini_get( 'session.cookie_path' ) ) ;?></td>
		  				</tr>
		  				<tr>
		  					<td>4</td>
		  					<td>Save Path</td>
		  					<td><?php echo esc_html( ini_get( 'session.save_path' ) );?></td>
		  				</tr>
		  				<tr>
		  					<td>5</td>
		  					<td>Use Cookies</td>
		  					<td><?php echo ( ini_get( 'session.use_cookies' ) ? 'On' : 'Off' );?></td>
		  				</tr>
		  				<tr>
		  					<td>6</td>
		  					<td>Use Only Cookies</td>
		  					<td><?php echo ( ini_get( 'session.use_only_cookies' ) ? 'On' : 'Off' );?></td>
		  				</tr>
		  				<?php }?>
		  			</table>
		  		</div>
			 </div>
			 <div id="post_dis10" class="post_inner">
		  		<div class="info_outer">
		  			<h3>Wordpress Active Theme info</h3>
		  			<div class="table_outer">
		  				<table>
		  				<tr>
		  					<th>S.No</th>
		  					<th colspan="2">Wordpress Active Theme info</th>
		  				</tr>
		  				<?php 
		  					$theme_info = wp_get_theme();
		  				?>
		  				<tr>
		  					<td>1</td>
		  					<td>Name</td>
		  					<td><?php echo $theme_data->get( 'Name' ); ?></td>
		  				</tr>
		  				<tr>
		  					<td>2</td>
		  					<td>Theme URI</td>
		  					<td><?php echo $theme_data->get( 'ThemeURI' ); ?></td>
		  				</tr>
		  				<tr>
		  					<td>3</td>
		  					<td>Description</td>
		  					<td><?php echo $theme_data->get( 'Description' ); ?></td>
		  				</tr>
		  				<tr>
		  					<td>4</td>
		  					<td>Author</td>
		  					<td><?php echo $theme_data->get( 'Author' ); ?></td>
		  				</tr>
		  				<tr>
		  					<td>5</td>
		  					<td>AuthorURI</td>
		  					<td><?php echo $theme_data->get( 'AuthorURI' ); ?></td>
		  				</tr>
		  				<tr>
		  					<td>6</td>
		  					<td>Version</td>
		  					<td><?php echo $theme_data->get( 'Version' ); ?></td>
		  				</tr>
		  				<tr>
		  					<td>7</td>
		  					<td>Status</td>
		  					<td><?php echo $theme_data->get( 'Status' ); ?></td>
		  				</tr>
		  				<tr>
		  					<td>8</td>
		  					<td>Tags</td>
		  					<td>
		  						<?php 
		  						$tags=$theme_data->get( 'Tags' ); 
		  							foreach ($tags as $t) {
		  								echo $t.',&nbsp;';
		  							}
		  						?>
		  					</td>
		  				</tr>
		  				<tr>
		  					<td>9</td>
		  					<td>Text Domain</td>
		  					<td><?php echo $theme_data->get( 'TextDomain' ); ?></td>
		  				</tr>
		  			</table>
		  			</div>
		  		</div>
		  	</div>
		<?php 
			global $_wp_admin_css_colors;
			$admin_color = get_user_option( 'admin_color' );
			$colors      = $_wp_admin_css_colors[$admin_color]->colors;
			$new_color=$colors[1];
		?>
		<style type="text/css">
			.organic-tabs a {                                
	    		background-color:<?php echo $new_color;?>;
			}
			.organic-tabs a:hover{
				color:#fff;
				opacity:0.8;
			}
			.organic-tabs a.active-tab{
				color:<?php echo $new_color;?>;
			}
			.organic-tabs a.active-tab:hover{
				color:<?php echo $new_color;?>;
			}
			.organic-tabs > ul li{
				border-color:<?php echo $new_color;?>;
			}
		</style>
		</div>
	</div>
<?php }