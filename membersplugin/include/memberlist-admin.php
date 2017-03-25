<?php
// ===============================================================
// memberlist-admin.php
// ===============================================================

// ---------------------------------------------------------------
// Set up the menulist admin menu
// ---------------------------------------------------------------

add_action('admin_menu','memberlist_admin_menu');

function memberlist_admin_menu() {
	add_menu_page(
		'Memberlist', //page title
		'Memberlist', //menu title
		'manage_options', //capabilities
		'memberlist_list', //menu slug
		'memberlist_list', //function
		'dashicons-groups' // icon
	);
	add_submenu_page(
		'memberlist_list', //parent slug
		'Add New Member', //page title
		'Add New', //menu title
		'manage_options', //capability
		'memberlist_insert', //menu slug
		'memberlist_insert' //function
	);
}


// ---------------------------------------------------------------
// memberlist_post_action() - Handle edit actions
// ---------------------------------------------------------------
function memberlist_post_action() {
	global $wpdb;
	global $id;
	if (!empty($_POST)) {
		$listaction = $_POST['listaction'];
		if (isset($_POST['memberid'])) {
			$id = $_POST['memberid'];
		}
		switch ($listaction) {
			case 'insert':
				include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-insert.php';
				break;
			case 'edit':
				include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-edit.php';
				break;
			case 'list':
				include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-list.php';
				break;
			case 'handleupdate':
				handle_memberlist_update();
				include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-list.php';
				break;
			case 'handledelete':
				handle_memberlist_delete();
				include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-list.php';
				break;
			case 'handleinsert':
				handle_memberlist_insert();
				include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-list.php';
				break;
			default: 
				echo "<h2>Nothing found!</h2>";
		}
	} else {
		include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-list.php';
	}
}

// ---------------------------------------------------------------
// Update a single member
// ---------------------------------------------------------------
function handle_memberlist_update() {
	global $wpdb;
	
	$table = $wpdb->prefix . 'memberlist';
	
	if (isset($_POST['memberid'])) {
		$id = $_POST['memberid'];
	}
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}
	if (isset($_POST['extra'])) {
		$extra = $_POST['extra'];
	}
	
	$wpdb->update(
		$table, //table
		array('name' => $name, 'phone' => $phone, 'email' => $email, 'extra' => $extra ), //variables
		array('ID'=>$id), // where
		array('%s','%s','%s','%s'), //data format
		array('%s') // where format
	);
}

// ---------------------------------------------------------------
// Insert a new member
// ---------------------------------------------------------------
function handle_memberlist_insert() {
	global $wpdb;
	
	$table = $wpdb->prefix . 'memberlist';
	

	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}
	if (isset($_POST['extra'])) {
		$extra = $_POST['extra'];
	}
	
	$wpdb->insert(
		$table, //table
		array('name' => $name, 'phone' => $phone, 'email' => $email, 'extra' => $extra ), //variables
		array('%s','%s','%s','%s') //data format
	);
}
// ---------------------------------------------------------------
// Delete a single member
// ---------------------------------------------------------------
function handle_memberlist_delete() {
	global $wpdb;
	
	if(isset($_POST['memberid'])) {
		$id = $_POST['memberid'];
		$sql = "DELETE FROM " . $wpdb->prefix . "memberlist WHERE id=$id";
		$wpdb->query($sql);
	}
}

// ---------------------------------------------------------------
// Display the memberlist action page
// ---------------------------------------------------------------

function memberlist_list() {
	global $wpdb;
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions!');
	}
	
	memberlist_post_action();
}

// ---------------------------------------------------------------
// Display the memberlist insert member page
// ---------------------------------------------------------------

function memberlist_insert() {
	global $wpdb;
	if (!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions!');
	}
	
	if (!empty($_POST)) {
		memberlist_post_action();
	} else {
		include MEMBERLIST_PLUGIN_DIR . '/pages/memberlist-insert.php';
	}
}

// ---------------------------------------------------------------
// CSS 
// ---------------------------------------------------------------

function memberlist_css() {
	echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">';
}

add_action('admin_head','memberlist_css');

?>