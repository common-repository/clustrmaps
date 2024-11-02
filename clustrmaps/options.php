<div class="wrap">
<h2>Clustr Maps</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('clustrmaps'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">User ID:</th>
<td><input type="text" name="userid" value="<?php echo get_option('userid'); ?>" /></td>
</tr>

<tr valign="top">
<th scope="row">Site:</th>
<td><input type="text" name="site" value="<?php echo get_option('site'); ?>" /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
