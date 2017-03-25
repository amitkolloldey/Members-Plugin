<?php 
// ===============================================================
// memberlist-insert.php
//
// Display the insert form for a new member
// ---------------------------------------------------------------


?>

<h2>Memberlist Add New Member</h2>

<div class="col-md-8">
  <div class="panel panel-primary">
	<div class="panel-heading">
	  <h3 class="panel-title">Member Information</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post">

			<input type="hidden" name="memberid" value="">
		
		  <div class="form-group">
			<label for="frmName" class="col-sm-4 control-label">Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="name" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="frmPhone" class="col-sm-4 control-label">Phone</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="phone" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="frmemail" class="col-sm-4 control-label">eMail</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="email" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="frmExtra" class="col-sm-4 control-label">Extra</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="extra" value="">
			</div>
		  </div>

		  <div class="col-sm-8 col-sm-offset-4">
			  <button type="submit" name="listaction" value="handleinsert" class="btn btn-success">Add New Member</button>
		  </div>

		</form>
	</div>
  </div>
</div>


<?php ?>

