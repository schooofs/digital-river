<?php
defined( 'ABSPATH' ) OR exit;

/*
 * Plugin Name: Simple Frontend Template Display
 * Plugin URI: http://www.mikeselander.com/
 * Description: Displays the current page template in the admin toolbar for quick & easy reference
 * Version: 0.4.0
 * Author: Mike Selander
 * Text Domain: page-template-display
 * Author URI: http://www.mikeselander.com/
 * License: GPL2
*/

/**
 * PageTemplateDisplay
 *
 * Creates a section on the admin menu bar to see the current page template
 *
 * @package WordPress
 * @category plugins
 * @author Mike Selander
 * @since 0.0.0
 * @link http://mikeselander.com
 * @copyright 2013 Mike Selander
 */
class PageTemplateDisplay{

	const VERSION = '0.4.0';

	/**
	 * Hook into appropriate actions in WordPress.
	 *
	 * @see add_action, $this->page_template_display, $this->get_similar_pages
	 *
	 * @return void
	 */
	public function _hooks(){

		add_action( 'admin_bar_menu', array( $this, "page_template_display" ), 500 );
		add_action( 'admin_bar_menu', array( $this, "get_similar_pages" ), 501 );

	} // end _hooks()


	/**
	 * Displays the template name on the admin menu bar
	 *
	 * @see WP_Admin_Bar
	 *
	 * @param type $wp_admin_bar Object containining the Wp Admin Bar items.
	 * @return void.
	 */
	public function page_template_display( $wp_admin_bar ){

		// Check for appropriate priveledges & that admin bar is running
		if ( !is_super_admin() || !is_admin_bar_showing() ){
			return;
		}

		// if you're not in the admin backend & it's a page
		if ( !is_admin() && is_page() ){

			// if _get_current_template_name returns - set the menu item
			if ( $this->_get_current_template_name() ) {

				$wp_admin_bar->add_node(
					array(
						'id' 		=> 'page_template',
						'title' 	=> __( 'Template: ' . $this->_get_current_template_name(), 'page-template-display' ),
						'parent'	=> false,
						'href' 		=> false
					)
				);

				// if _get_current_page_slug returns - set the next menu item
				if ( $this->_get_current_page_slug() ) {

					$wp_admin_bar->add_node(
						array(
							'id' 		=> 'page_template_slug',
							'title' 	=> __( $this->_get_current_page_slug(), 'page-template-display' ),
							'parent'	=> 'page_template',
							'href' 		=> false
						)
					);

				} // end if _get_current_page_slug returns

			} // end if template name is returned

		} // end if !is_admin && is_page

	} // end page_template_display()


	/**
	 * Finds and returns the template name from all available page templates.
	 *
	 * @access private
	 *
	 * @see wp_get_theme()
	 *
	 * @return string Give name of template file used, "Default" if none.
	 */
	private function _get_current_template_name(){
		$returned = false;

		// get all templates
		$all_templates = wp_get_theme()->get_page_templates();

		// Loop through templates and match file w/ith a name
		foreach ( $all_templates as $filename => $name ) {

			// if the template matches one of the filenames, return
			if ( $this->_get_current_page_slug() == $filename ){
				return $name;
			};

		} // end foreach

		// If no template is matched, then return "Default"
		return "Default";

	} // end _get_current_template_name()


	/**
	 * Finds the current page template slug used on a page.
	 *
	 * @access private
	 *
	 * @see get_page_template_slug
	 * @global object $wp_query Description.
	 *
	 * @return string Slug/path of current page template used.
	 */
	private function _get_current_page_slug(){
		global $wp_query;

		$post_id = $wp_query->post->ID;
		return get_page_template_slug( $post_id );

	} // end _get_current_page_slug()


	/**
	 * Identify and grab other pages using the same template
	 *
	 * @see WP_Admin_Bar, WP_Query
	 * @global object $wp_query
	 *
	 * @param type $wp_admin_bar Object containining the Wp Admin Bar items.
	 * @return void.
	 */
	public function get_similar_pages( $wp_admin_bar ){
		global $wp_query;

		// Check for appropriate priveledges & that admin bar is running
		if ( !is_super_admin() || !is_admin_bar_showing() ){
			return;
		}

		// if you're not in the admin backend & it's a page
		if ( !is_admin() && is_page() ){

			// define the variables
			$template = $this->_get_current_page_slug();
			$post_id = $wp_query->post->ID;
			$i = 1;

			// query the pages
			$args = array(
	           'post_type' 	=> 'page',
			   'meta_key' 	=> '_wp_page_template',
			   'meta_value' => $template,
	           'exclude'	=> $post_id
	        );

	        $pages = get_pages( $args );

			// if the query returns results, add a header node
			if ( !empty( $pages ) ) {

				$wp_admin_bar->add_node(
					array(
						'id' 		=> 'similar_pages',
						'title' 	=> "<strong>" . __( 'Similar Pages:', 'page-template-display' )."</strong>",
						'parent'	=> 'page_template',
						'href' 		=> false
					)
				);

				// Loop through the results
			    foreach( $pages as $page ){

					// Loop until we hit 15
					if ( $i < 16 ) {

						$wp_admin_bar->add_node(
							array(
								'id' 		=> 'similar_page_' . $i,
								'title' 	=> $page->post_title,
								'parent'	=> 'page_template',
								'href' 		=> get_permalink( $page->ID )
							)
						);

					} // end if

					$i++;

			    } // end foreach

			} // end if have posts

		} // end if !is_admin && is_page()

	} // end get_similar_pages()

} // end Class

// Register class & call hooks
$display_template = new PageTemplateDisplay;
$display_template->_hooks();

?>