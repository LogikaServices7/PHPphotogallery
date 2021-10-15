<section class="Login">
	<div class="section-header center white">
		<h1>Login</h1>
		<h6><a href="login.php">Home</a> &gt; <span>Login</span></h6>
		
	</div>
	<div class="container-fluid dark-form">
		<div class="row">
			<form method="post" id="login-form" action="login.php">
				

				<input type="text" name="username" id="username" placeholder="Choose a Username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>"/>

				<input type="password" name="password" id="password" placeholder="Enter Your Password Here"/>

				<input type="submit" id="submit" name="submit" value="Login" class="cta primary-bg">
			</form>
			<div id="error">
				
			</div>
			<div id="success">
				
			</div>
		</div>
	</div>
	
</section>


<?php

	include 'db.inc.php';
	
	$username="";
	
	$password="";
	
	$error = array();
	

	function login($username,$password)
	{
		global $error;
		global $link;
	    
		$newpwd = md5($password);
		$query = "SELECT * FROM users WHERE username= '$username' and password= '$newpwd'";


		$queryrun = mysqli_query($link,$query);

		if(mysqli_num_rows($queryrun)>0)
		{
			$_SESSION['user'] = $username;
			header('Location:index.php');
		}
	}

	function sanitize($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);

		return $data;
	}
	
	if(isset($_POST['submit']))
	{
		$username = sanitize($_POST['username']);
		$password = sanitize($_POST['password']);

		if(empty($username))
		{
			?>
			   <script type="text/javascript">
			   	$('#error').append("Enter Username");
			   </script>
			<?php   
		}

		elseif (empty($password)) 
		{
			?>
			   <script type="text/javascript">
			   	$('#error').append("Enter Password");
			   </script>
			<?php   
		}

		else
		{
			login($username,$password);
		}
	}

		
 ?>

 