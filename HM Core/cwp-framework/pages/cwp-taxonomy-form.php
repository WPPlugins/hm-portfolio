<div class="wrap"><style>.form-table th { width: 100px; }</style><?php if( $tag ) : ?>	<?php screen_icon(); ?>	<h2><?php _e('Edit ' . $page->args['single']); ?></h2><?php else : ?>	<h3><?php _e('Add a New ' . $page->args['single']); ?></h3><?php endif; ?><div id="ajax-response"></div><form name="edittag" id="edittag" method="post" action="" class="validate"><?php if( $tag ) : ?>	<input type="hidden" name="action" value="editedtag" /><?php else : ?>	<input type="hidden" name="action" value="addtag" /><?php endif; ?><input type="hidden" name="cwp_submitted_<?php echo $page->get_page_id() ?>" value="taxonomy-add" /><input type="hidden" name="page" value="<?php echo $_GET['page'] ?>" /><input type="hidden" name="tag_ID" value="<?php echo esc_attr($tag->term_id) ?>" /><input type="hidden" name="taxonomy" value="<?php echo esc_attr($taxonomy) ?>" /><?php if( $tag ) : ?>	<?php wp_original_referer_field(true, 'previous'); wp_nonce_field('update-tag_' . $tag_ID); ?><?php else : ?>	<?php wp_original_referer_field(true, 'previous'); wp_nonce_field('add-tag'); ?><?php endif; ?>	<table class="form-table">		<tr class="form-field form-required">			<th scope="row" valign="top"><label for="name"><?php _e( $page->args['single'] . ' Name') ?></label></th>			<td><input name="name" id="name" type="text" value="<?php if ( isset( $tag->name ) ) echo esc_attr($tag->name); ?>" size="40" aria-required="true" />            <p class="description"><?php _e('The name is how the ' . $page->args['single'] . ' appears on your site.'); ?></p></td>		</tr>		<tr class="form-field">			<th scope="row" valign="top"><label for="slug"><?php _e($page->args['single'] . ' Slug') ?></label></th>			<td><input name="slug" id="slug" type="text" value="<?php if ( isset( $tag->slug ) ) echo esc_attr(apply_filters('editable_slug', $tag->slug)); ?>" size="40" />            <p class="description"><?php _e('The &#8220;slug&#8221; is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.'); ?></p></td>		</tr>		<tr class="form-field">			<th scope="row" valign="top"><label for="description"><?php _e('Description') ?></label></th>			<td><textarea name="description" id="description" rows="5" cols="50" style="width: 97%;"><?php echo esc_html($tag->description); ?></textarea><br />            <span class="description"><?php _e('The description is not prominent by default, however some themes may show it.'); ?></span></td>		</tr>		<?php do_action('cwp_edit_term_form_fields', $tag); ?>		<?php do_action('cwp_edit_term_form_fields_' . $taxonomy, $tag); ?>	</table><p class="submit"><input type="submit" class="button-primary" name="submit" value="<?php echo $tag ? esc_attr_e('Update ' . $page->args['single'] ) : 'Add ' . $page->args['single'] ?>" /></p><?php do_action('edit_tag_form', $tag); ?></form></div>