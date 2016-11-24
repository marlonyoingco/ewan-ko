<?php
wp_enqueue_script('jquery');
wp_enqueue_script('thickbox');
wp_enqueue_script('media-upload');
wp_enqueue_style('thickbox');
wp_enqueue_script('settings', get_template_directory_uri()."/includes/back/classes/ThemeSettings/js/theme-settings.js", ['jquery']);
$fields = get_option('theme_settings');
?>

<div class="wrap">
	<h2>Global Fields</h2>

	<form action ="options.php" method="POST">
		<?php settings_fields("theme_group"); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Logo</th>
				<td>
					<input type="text" name="theme_settings[logo]" size="25"
					       value="<?php echo $fields['logo']; ?>" id="logo" readonly="true"/>
					<input type="button" id="upload_logo" class="upload_image button-secondary" value="Upload Logo"/><br/><br/>
					<img id="image_logo" style="max-width:200px" src="<?php echo $fields['logo']; ?>"/>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Email</th>
				<td>
					<input type="text" name="theme_settings[email]" size="25"
					       value="<?php echo $fields['email']; ?>" />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Telephone</th>
				<td>
					<input type="text" name="theme_settings[telephone]" size="25"
					       value="<?php echo $fields['telephone']; ?>" />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Mobile</th>
				<td>
					<input type="text" name="theme_settings[mobile]" size="25"
					       value="<?php echo $fields['mobile']; ?>" />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Facebook URL</th>
				<td>
					<input type="text" name="theme_settings[facebook]" size="25"
					       value="<?php echo $fields['facebook']; ?>" />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Linkedin URL</th>
				<td>
					<input type="text" name="theme_settings[linkedin]" size="25"
					       value="<?php echo $fields['linkedin']; ?>" />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Footer Content</th>
				<td>
					<?php
						wp_editor($fields['footer_content'], 'footer_content', [
							'media_buttons' => false,
							'textarea_name' => 'theme_settings[footer_content]'
						]);
					?>
				</td>
			</tr>
		</table>
		<input type="submit" value="Save Settings" class="button-primary" />
	</form>
</div>