<?php 
	
	@session_start();
 	
	if(isset($_SESSION['user']))
	{
		$session = $_SESSION['user'];
	}
	else{
		$session = null;
	}	

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Photogallery</title>

    <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/simpletextrotator.css">
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	
 
	
	
	
	
	
	
	
	
	
</head>
<body>
	<!-- <header> -->
	<header>	
		 <div class="container "> 
		 	<a href="#" class="logo navbar-brand bold">Photo<span class="try">G</span>allery</a>

			 <div class="row float-right mt-3"> 
				 <!-- <a href="#" class="logo ">PhotoGallery</a>  -->
				<nav class="navbar-nav  d-flex align-items-center ">
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu"><i class="fa fa-bars"></i>
					</button>
					<div class="collapse  navbar-collapse" id="menu">
						<ul class="center ">
							<li><a href="index.php" >Home</a></li>
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="" >About</a></li>
							<li ><a href="">Contact</a></li>

							<?php 
								if($session==null)
								{

							 ?>
								<li class="login"><a href="login.php" class="btn btn-outline-primary btn-sm ">Login</a></li>
								<li class="register"><a href="register.php" class="btn btn-outline-danger btn-sm ">Register</a></li>
							 <?php 
							 	}
							 	else 
							 	{	
							  ?>   
							
								<li class="logout"><a href="logout.php" class="btn btn-outline-primary btn-sm ">Logout</a></li>


								<?php 
									}
								 ?>
							
							
							
						</ul>
					
				</div>
				</nav>
				</div> 
		
	    	 </div> 
		</header>
			
		
 	<!-- </header>  -->