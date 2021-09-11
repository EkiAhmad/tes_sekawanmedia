<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
<style>
</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Form Edit Profile
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>
				<form method="post" action="<?php echo base_url(); ?>index.php/editprofilecontroller/process">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" value="<?= $username ?>" disabled>
						<i>username can't be changed</i>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						<i>leave blank if password is not changed</i>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" value="<?= $name ?>">
					</div>
					<div class="form-group">
						<label for="nama">Email</label>
						<input type="email" class="form-control" name="email" id="email" value="<?= $email ?>">
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" class="form-control">
							<option <?= ($role == '0') ? 'selected' : '' ?> value="0">Admin</option>
							<option <?= ($role == '1') ? 'selected' : '' ?> value="1">Approval</option>
							<option <?= ($role == '2') ? 'selected' : '' ?> value="2">User</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Change Profile</button>
				</form>
			</div>
			<div class="card-footer text-muted">
				<!-- <i>already have an account?</i><br><br> -->
				<a href="<?php echo base_url(); ?>index.php/homecontroller" class="btn btn-success">Back</a>
			</div>
		</div>
	</div>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/crud_operation.js'?>"></script>
</body>
</html>