<?php 
// ===============================================================
// memberlist-shortcodes.php
//
// Shortcode usage - WP editors can add the shortcode [memberlist]
//                   to list all members
// ---------------------------------------------------------------

add_shortcode('memberlist', 'memberlist_user_form');

function memberlist_user_form($atts) {
	include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-shortcode-form.php';
}

?>