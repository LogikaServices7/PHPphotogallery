<?php 


	session_start();
	$pic = 0;
	$filetodelete = "";
	$filename = $_FILES['file1']['name'];
	//echo $filename;

	$tmpname = $_FILES['file1']['tmp_name'];
	$session = $_SESSION['user'];
	
	$destination = 'uploads/'.$session.'/'.$filename;

	

	$id = '';
	$approved =0;

	$link= mysqli_connect("localhost","root","","photogallery");
	$query = "insert into pics values('$id','$session','$filename','$approved')";
	$query_run = mysqli_query($link,$query);

	if($query_run)
	{
		if(move_uploaded_file($tmpname, $destination))
		{
			echo $destination;
		}
	}


 ?>