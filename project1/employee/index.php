<?php include('include/header.php'); ?>
<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="index.php" class="navbar-brand mr-3">Leaves Management System</a>
			
		</div>
		
	</nav>
	<!--This Is Header-->
	<header id="main-header" class="bg-primary py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-user"></i> Employee Login</h1>
				</div>
			</div>
		</div>
	</header>
	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				
				
			</div>
		</div>
	
	</section>
	
	<section id="post">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">
							<h5>Login Panel</h5>
						</div>
						<div class="card-body p-3">
							<form action="" method="POST">
								<label class="form-control-label">Email</label>
								<input type="email" name="email" class="form-control"  />
								<br />
								<label class="form-control-label">Password</label>
								<input type="password" name="password" class="form-control"  />
								<br />
								<input type="submit" name="submit" class="btn btn-primary" style="border-radius:0%;" value="Log In" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br>
	
	
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>

</body>
</html>

<?php 
	
	if(isset($_POST['submit'])){
		$user = $_POST['email'];
		$password = $_POST['password'];

		//$password = md5($_POST['password']);

		include 'include/db.php';

		$sql = "SELECT * FROM employees WHERE email = '$user' AND password = '$password'";

		$run = mysqli_query($mysqli,$sql);
		$check = mysqli_num_rows($run);

		$name = $_GET['name'];

		if($check == 1){
			session_start();
			$_SESSION['email'] = $user;
			
			echo "<script> 
					window.open('dashboardEmp.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Email or Password Invaild');
			window.open('index.php','_self');
			</script>";
		}
	}

 ?>