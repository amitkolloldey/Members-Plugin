<?php 
// ===============================================================
// memberlist-shortcode-form.php
//
// Display the memberlist in a neat table
// ---------------------------------------------------------------

global $wpdb;
$valid = true;
$SQL = "SELECT * FROM " . $wpdb->prefix . "memberlist";
$formData = $wpdb->get_results($SQL);

if (!$formData) {
	$valid = false;
	echo $SQL . '<p>This form is invalid - please check</p>';
}
?>
<table class="table">
	<tr class="info">
		<th>Name</th>
		<th>Phone</th>
		<th>eMail</th>
		<th>Extra</th>
	</tr>
<?php
if ($valid) {
	
	foreach ($wpdb->get_results($SQL) as $key => $row ) {
		$name = $row->name;
		$phone = $row->phone;
		$email = $row->email;
		$extra = $row->extra;
		?>
		<tr>
			<td><?php echo $name; ?></td>
			<td><?php echo $phone; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $extra; ?></td>
		</tr>
		<?php
	}	
}
?>
</table>
<?php ?>

