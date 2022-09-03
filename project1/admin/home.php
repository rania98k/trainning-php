<?php
	session_start();
 

 
	//connection
	$conn = new mysqli('localhost', 'root', '', 'projectdb');
 
	//get user details
	$sql = "SELECT * FROM admin WHERE id = '".$_SESSION['email']."'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>How to Change Password using PHP</title>

</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Change Password using PHP</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px;">
     
			<hr>
			<form method="POST" action="change_password.php">
				<div class="form-group">
					<label for="old">Old Password:</label>
					<input type="password" name="old" id="old" class="form-control" value="<?php echo (isset($_SESSION['old'])) ? $_SESSION['old'] : ''; ?>">
				</div>
				<div class="form-group">
					<label for="new">New Password:</label>
					<input type="password" name="new" id="new" class="form-control" value="<?php echo (isset($_SESSION['new'])) ? $_SESSION['new'] : ''; ?>">
				</div>
				<div class="form-group">
					<label for="retype">Retype New Password:</label>
					<input type="password" name="retype" id="retype" class="form-control" value="<?php echo (isset($_SESSION['retype'])) ? $_SESSION['retype'] : ''; ?>">
				</div>
				<button type="submit" name="update" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
			<?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
                    <?php echo $_SESSION['error']; ?>
					</div>
					<?php
 
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success text-center" style="margin-top:20px;">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php
 
					unset($_SESSION['success']);
				}
			?>
		</div>
	</div>
</div>
</body>
</html>