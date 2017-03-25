<?php 
// ===============================================================
// memberlist-list.php
//
// Display the memberlist in a neat actionable table
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

<form action="" method="post">
	<input type="hidden" name="listaction" value="insert" />
	<button type="submit" class="btn btn-primary">Add New Member</button>
</form>

<table class="table">
	<tr class="info">
		<th>Name</th>
		<th>Phone</th>
		<th>eMail</th>
		<th>Extra</th>
		<th>Action</th>
	</tr>
<?php
if ($valid) {
	
	foreach ($wpdb->get_results($SQL) as $key => $row ) {
		$id = $row->id;
		$name = $row->name;
		$phone = $row->phone;
		$email = $row->email;
		$extra = $row->extra;
		?>
		<tr>
			<form action="" method="post">
				<input type="hidden" name="listaction" value="edit" />
				<input type="hidden" name="memberid" value="<?php echo $id; ?>" />
				<td><?php echo $name; ?></td>
				<td><?php echo $phone; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $extra; ?></td>
				<td>
					<div class="btn-group" role="group">
						<button type="submit" class="btn btn-primary"> 
							<span class="label label-primary glyphicon glyphicon-pencil" />
						</button>
					</div>					
				</td>
			</form>
		</tr>
		<?php
	}	
}
?>
</table>
<?php ?>

