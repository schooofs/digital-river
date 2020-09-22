<?php
   /*
   Plugin Name: Multilingual Markup For Multisite Translations
   Plugin URI: https://www.digitalriver.com/
   Description: Multilingual Markup For Multisite Translations
   Version: 1.2
   Author: Digital River
   Author URI: https://www.digitalriver.com/
   License: GPL2
   */


class MultilingualPlugin {

	static $db_version = '1.0';

     static function install()
     {
		global $wpdb;

		$table_name = $wpdb->base_prefix . 'dr_multilingual';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			main_id mediumint(9) NOT NULL,
			blog_id mediumint(9) NOT NULL,
			post_id mediumint(9) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		update_option( 'jal_db_version', $jal_db_version );
     }
}
register_activation_hook( __FILE__, array( 'MultilingualPlugin', 'install' ) );





add_action( 'add_meta_boxes', 'add_wpdocs_meta_box' );
add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
function add_wpdocs_meta_box() {

	foreach(["page","post"] as $post_type){
	    add_meta_box(
	        'multilingual_metabox',
	        __( 'Multilingual Pages', 'textdomain' ),
	        'multilingual_metabox_callbox',
	        $post_type,
	        'normal'
	    );
	}
}

/* Save the meta box's post metadata. */
function smashing_save_post_class_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

	global $wpdb;

	$table_name = $wpdb->base_prefix . 'dr_multilingual';

	$main_id = $wpdb->get_var(sprintf("SELECT main_id FROM %s WHERE post_id = %s AND blog_id = %s", $table_name, $post_id, get_current_blog_id()));

	// if current page is not already associated
	if($main_id === null) {

		// get main id from a associated page
		foreach($_POST['multilingual'] as $page) {

			if($main_id === null)
				$main_id = $wpdb->get_var( sprintf("SELECT main_id FROM %s WHERE post_id = %s AND blog_id = %s", $table_name, $page['page'], $page['locale']));
		}

		//if main id is found, associate the page
		if($main_id !== null) {

			$wpdb->insert(
				$table_name,
				array(
					'blog_id' => get_current_blog_id(),
					'post_id' => $post_id,
					'main_id' => $main_id,
				),
				array(
					'%d',
					'%d',
					'%d'
				)
			);

    		return $post_id;

		}

	}

	// if main_id is set and nothing is posted then delete the association
	if(!isset($_POST['multilingual']) && $main_id !== null)
		$wpdb->delete($table_name, ['main_id' => $main_id]);

	// get the associated pages by main id
	if($main_id !== null)
		$existing_pages = $wpdb->get_results( sprintf("SELECT post_id, blog_id FROM %s WHERE main_id = %s AND post_id != %s", $table_name, $main_id, $post_id));

	$multilingual = $_POST['multilingual'];

	if(isset($existing_pages) && $existing_pages !== null) {
		foreach($existing_pages as $existing_key => $existing_page) {
			foreach($multilingual as $key => $page) {
				if($existing_page->post_id === $page['page'] && $existing_page->blog_id === $page['locale']) {
					unset($multilingual[$key]);
					unset($existing_pages[$existing_key]);
				}
			}
		}
	}

	if(count($existing_pages) > 0) {
		foreach($existing_pages as $existing_key => $existing_page) {
			$wpdb->delete($table_name, ['blog_id' => $existing_page->blog_id, 'post_id' => $existing_page->post_id]);
		}
	}

	foreach($multilingual as $page) {

		$wpdb->insert(
			$table_name,
			array(
				'blog_id' => $page['locale'],
				'post_id' => $page['page'] ,
				'main_id' => ($main_id === null) ? -1 : $main_id ,
			),
			array(
				'%d',
				'%d',
				'%d',
			)
		);

		if ($main_id === null) {

			$main_id = $wpdb->insert_id;
			$wpdb->update(
				$table_name,
				['main_id' => $main_id],
				['id' => $main_id],
				['%d']
			);

			$wpdb->insert(
				$table_name,
				array(
					'blog_id' => get_current_blog_id(),
					'post_id' => $post_id,
					'main_id' => $main_id,
				),
				array(
					'%d',
					'%d',
					'%d'
				)
			);

		}

	}

}


class MultilingualForm {

	protected $multisite_pages;
	protected $sites;
	protected $current_blog_id;

	public function __construct()
	{
	    $this->sites = get_sites();
		$this->current_blog_id = get_current_blog_id();

		foreach( $this->sites as $site ) {
		    switch_to_blog( $site->blog_id );
		    $this->multisite_pages[$site->blog_id] = array_merge(get_pages(['post_type'=>'page']),get_posts(['post_type'=>'post']));
		}
		switch_to_blog( $this->current_blog_id );
	    $this->multisite_pages[$this->current_blog_id] = array_merge(get_pages(['post_type'=>'page']),get_posts(['post_type'=>'post']));
	}

	public function get_form($post)
	{
		ob_start();

		global $wpdb;

		$table_name = $wpdb->base_prefix . 'dr_multilingual';

		$main_id = $wpdb->get_var( sprintf("SELECT main_id FROM $table_name WHERE post_id = %s AND blog_id = %s", $post->ID, $this->current_blog_id));

		if ($main_id !== null) {
			$pages = $wpdb->get_results( sprintf("SELECT post_id, blog_id FROM $table_name WHERE main_id = %s", $main_id));
		}
	  ?>
	  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>
		<table >
			<tbody id="mulilingualForm" style="width:500px;">
			<?php
			if(isset($pages)):
				$pageCount = 0;
				foreach($pages as $key => $page):
					if($post->ID != $page->post_id && $page->blog_id != $this->current_blog_id){
						echo $this->get_row($page->blog_id, $pageCount, $page->post_id);
						$pageCount++;
					}
				endforeach;
			endif;
			?>
			</tbody>
		</table>
		<br><br>
		<select id="multilingualLocale">
			<?php foreach($this->sites as $site): ?>
				<?php if($site->blog_id != 1): ?>
					<option value="<?= $site->blog_id ?>"><?= $site->domain ?></option>
				<?php endif; ?>
			<?php endforeach ?>
		</select>
		<button id="mulilingualAdd" class="button"><?php _e("Add New Locale", "digital-river") ?></button>
		<script>
			jQuery(document).ready(function($) {

				$(document).on("click", ".remove-page", function(e){
					e.preventDefault();
					$(this).closest(".mulilingual-page").remove();
				});

				$(document).on("click", "#mulilingualAdd", function(e){
					e.preventDefault();
					jQuery.post(ajaxurl, {action: 'add_mulilingual_page', locale:$("#multilingualLocale").val(), pagesCount: $(".mulilingual-page").length}, function(newPage) {
						console.log(newPage);
						$("#mulilingualForm").append(newPage);
					});
				});
			});
		</script>
		<?php
		return ob_get_clean();
	}

	public function get_row($blog_id, $row_count, $page_id = null)
	{
		ob_start();
		?>
		<tr class="mulilingual-page">
			<td style="width:100px;">
				<input type="hidden" name="multilingual[<?= $row_count ?>][locale]" value="<?= $blog_id ?>">
				<?php foreach($this->sites as $site): ?>
					<?= $site->blog_id == $blog_id ? $site->domain : null ?>
				<?php endforeach ?>
			</td>
			<td>
				<select name="multilingual[<?= $row_count ?>][page]" style="width:250px;">
					<?php foreach($this->multisite_pages[$blog_id] as $wordpress_page): ?>
						<option <?= $wordpress_page->ID == $page_id ? "selected" : null ?> value="<?= $wordpress_page->ID ?>"><?= $wordpress_page->post_title ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<button class="remove-page button"><?php _e("Remove Page", "digital-river") ?></button>
			</td>
		</tr>
		<?php
		return ob_get_clean();
	}

}


function add_mulilingual_page()
{
	$form = new MultilingualForm();
	echo $form->get_row($_POST['locale'], $_POST['pagesCount']);
	wp_die();
}
add_action( 'wp_ajax_add_mulilingual_page', 'add_mulilingual_page' );



/**
 * Get post meta in a callback
 *
 * @param WP_Post $post    The current post.
 * @param array   $metabox With metabox id, title, callback, and args elements.
 */

function multilingual_metabox_callbox( $post, $metabox )
{
	$form = new MultilingualForm();
	echo $form->get_form($post);
}



function hook_hreflang_tags()
{
	global $wpdb;

	$table_name = $wpdb->base_prefix . 'dr_multilingual';

	$main_id = $wpdb->get_var( sprintf("SELECT main_id FROM %s WHERE post_id = %s AND blog_id = %s", $table_name, get_the_ID(), get_current_blog_id()));

	if ($main_id === null)
		return false;

	$pages = $wpdb->get_results( sprintf("SELECT post_id, blog_id FROM %s WHERE main_id = %s", $table_name, $main_id));

    $sites = get_sites();
	$current_blog_id = get_current_blog_id();

	$hreflangs = [];
    $hreflangs[$current_blog_id] = get_field("language", "option") . "-" . get_field("country", "option");

	foreach( $sites as $site ) {
		if($site->blog_id == 1) continue;

	    switch_to_blog( $site->blog_id );
	    $hreflangs[$site->blog_id] = get_field("language", "option") . "-" . get_field("country", "option");
	}
	switch_to_blog( $current_blog_id );
    foreach($pages as $page): ?>
	   <?php switch_to_blog( $page->blog_id ); ?>
<link rel="alternate" href="<?= urldecode(get_permalink($page->post_id)) ?>" hreflang="<?= $hreflangs[$page->blog_id] ?>" />
	<?php endforeach;
	switch_to_blog($current_blog_id);
}
add_action('wp_head', 'hook_hreflang_tags');


function display_language_selector()
{
	global $wpdb;

	$table_name = $wpdb->base_prefix . 'dr_multilingual';

	$main_id = $wpdb->get_var( sprintf("SELECT main_id FROM %s WHERE post_id = %s AND blog_id = %s", $table_name, get_the_ID(), get_current_blog_id()));

	$pages = $wpdb->get_results( sprintf("SELECT post_id, blog_id FROM %s WHERE main_id = %s", $table_name, $main_id));
	$formatted_pages = [];
	foreach($pages as $page):
		$formatted_pages[$page->blog_id] = $page->post_id;
	endforeach;
	$current_blog_id = get_current_blog_id();

	 $all_sites = get_sites();

	 $sites = array_splice($all_sites, 1);


	 foreach($sites as $key => $site) {
	 	if(strpos($site->domain, "www") !== false){
	 		unset($sites[$key]);
	 		array_unshift($sites, $site);
	 	}
	 }

	?>


    <ul class="list-unstyled list-inline language-menu">

    	<?php foreach($sites as $key => $site):  ?>
    	<li>
	   		<?php switch_to_blog( $site->blog_id ); ?>

    		<?php if($current_blog_id != $site->blog_id): ?>

			<a href="<?= (isset($formatted_pages[$site->blog_id]) ? get_permalink($formatted_pages[$site->blog_id]) : get_home_url()) ?>">
    		<?php else: ?>
    		<span class="selected">
    		<?php endif;

    			echo get_field('language_label', 'option');


    		 ?>
    		<?php if($current_blog_id != $site->blog_id): ?>
			</a>
			<?php else: ?>
			</span>
    		<?php endif; ?>

    		<?php if(count($sites) != ($key+1)): ?>
			<span class="divider">|</span>
			<?php endif; ?>

		 </li>
		<?php endforeach; ?>

    </ul>
	<?php switch_to_blog( $current_blog_id );
}