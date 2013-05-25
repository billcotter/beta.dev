<?php
/*
 WARNING: This file is part of the core Genesis framework. DO NOT edit
 this file under any circumstances. Please do all modifications
 in the form of a child theme.
 */

/**
 * Initialize the framework from template files.
 *
 * This file is a core Genesis file and should not be edited.
 *
 * @category Genesis
 * @package  Framework
 * @author   StudioPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.studiopress.com/themes/genesis
 */

/**
 * Used to initialize the framework in the various template files.
 *
 * It pulls in all the necessary components like header and footer, the basic
 * markup structure, and hooks.
 *
 * @since 1.3.0
 */
function genesis() {

	get_header();

	do_action( 'genesis_before_content_sidebar_wrap' );
	genesis_markup( array( 
		'html5'   => '<div %s>',
		'xhtml'   => '<div id="content-sidebar-wrap">',
		'context' => 'content-sidebar-wrap',
	) );
	
		do_action( 'genesis_before_content' );
		genesis_markup( array( 
			'html5'   => '<main %s>',
			'xhtml'   => '<div id="content" class="hfeed">',
			'context' => 'content',
		) );
			do_action( 'genesis_before_loop' );
			do_action( 'genesis_loop' );
			do_action( 'genesis_after_loop' );
		genesis_markup( array( 
			'html5' => '</main>', //* end .content
			'xhtml' => '</div>', //* end #content
		) );
		do_action( 'genesis_after_content' );
	
	echo '</div>'; //* end .content-sidebar-wrap or #content-sidebar-wrap
	do_action( 'genesis_after_content_sidebar_wrap' );

	get_footer();

}
