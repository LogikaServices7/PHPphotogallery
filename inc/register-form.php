<section class="registration">
	<div class="section-header center white">
		<h1>Registration</h1>
		<h6><a href="index.php">Home</a> &gt; <span>Register</span></h6>
		
	</div>
	<div class="container-fluid dark-form">
		<div class="row">
			<form method="post" id="register-form" action="register.php">
				<input type="text" name="fname" id="fname" placeholder="Enter First Name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>" />

				<input type="text" name="lname" id="lname" placeholder="Enter Last Name" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];}?>"/>

				<input type="text" name="username" id="username" placeholder="Choose a Username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>"/>

				<input type="email" name="email" id="email" placeholder="Enter Your Email Address" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"/>

				<input type="password" name="password" id="password" placeholder="Enter Your Password Here"/>

				<input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Your Password Here"/>

				<textarea name="bio" id="bio" cols="30" rows="5" placeholder="Enter your Bio Here(Optional)" value="<?php if(isset($_POST['bio'])){echo $_POST['bio'];}?>"></textarea>

				<input type="submit" id="submit" name="submit" value="Register" class="cta primary-bg">
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
	$fname="";
	$lname="";
	$username="";
	$email = "";
	$password="";
	$bio = "";
	$uploads = 0;
	$id="";
	$error = array();
	

	function register($id,$fname,$lname,$username,$email,$password,$bio,$uploads)
	{
		global $error;
		global $link;
	    
		$newpwd = md5($password);
		$query = "INSERT INTO users values('$id','$fname','$lname','$username','$email','$newpwd','$bio','$uploads')";

		if(mysqli_query($link,$query))
		{
			echo "You have been registered SUCCESSFULLY!<a href='login.php'><style= textalign:center> Click Here to Login</style></a> " ;
		}
		else
		{
			echo "Error Registering";
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
		if(empty($_POST['fname']))
		{
			$error[] = "First Name Required";
		}
		elseif(strlen($_POST['fname'])>25)
		{
			$error[]= "First Name should be 25 characters Max";
		}
		else
		{
			$fname = sanitize($_POST['fname']);
		}

		// lastname
		if(empty($_POST['lname']))
		{
			$error[]= "Last Name Required";
		}
		elseif(strlen($_POST['lname'])>25)
		{
			$error[]= "Last Name should be 25 characters Max";
		}
		else
		{
			$lname = sanitize($_POST['lname']);
		}

		// username
		if(empty($_POST['username']))
		{
			$error[]= "Username Required";
		}
		elseif(strlen($_POST['username'])>25)
		{
			$error[]= "Username should be 25 characters Max";
		}
		else
		{
			$username = sanitize($_POST['username']);
		}

		// email
		if(empty($_POST['email']))

		{
			$error[]= "Email Address Required";
		}

		elseif(strlen($_POST['email'])>50)

		{
			$error[]= "Email should be 50 characters Max";
		}

		elseif(!(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)))

		{
			$error[]="Email is not a valid email address";
		}

		else

		{
			$email = sanitize($_POST['email']);
		}

		// Password
		if(empty($_POST['password']))
		{
			$error[]= "Password Required";
		}
		elseif(strlen($_POST['password'])>32)
		{
			$error[]= "Password should be 32 characters Max";
		}
		else
		{
			$password = sanitize($_POST['password']);
			if(!empty($_POST['confirm-password']))
			{
				if($_POST['password']!=$_POST['confirm-password'])
				{
					$error[]="Password/Confirm-Password DO NOT match";
				}
			
			}
			else
			{
				$error[]= "Confirm your password";
			}	
		}

		// bio

		if(!empty($bio))
		{
			$bio=sanitize($_POST['bio']);
		}

		// errors

		if(count($error)==0)
		{
			$checkusername = "SELECT * FROM users WHERE username = '$username'";
			$runqueryusername = mysqli_query($link,$checkusername);
 
			$checkemail = "SELECT * FROM users WHERE email = '$email'";
			$runqueryemail = mysqli_query($link,$checkemail);

			if(mysqli_num_rows($runqueryusername)>0)
			{
				echo $error[] = "Username Exists!";
			}

			elseif(mysqli_num_rows($runqueryemail)>0)
			{
				echo $error[] = "Email Address exists";
			}
			else
			{
				register($id,$fname,$lname,$username,$email,$password,$bio,$uploads);
			}
		}

		else
		{
			foreach ($error as $key => $value) {
				
			
			 echo $value.'<br>';

			
			}
		}
	}
		
 ?>

 