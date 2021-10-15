<?php 

	$picid = $_POST['id'];
	include 'inc/db.inc.php';
	$approved = 1;

	$link= mysqli_connect("localhost","root","","photogallery");
	$query = "UPDATE pics SET approved='$approved' where pid='$picid'";

	
	$query1 = "SELECT * from users where username=(SELECT username from pics where pid='$picid')";
	$query_run = mysqli_query($link,$query);

	if($query_run)
	{
		echo 'Approved <br>';

		$query_run1 = mysqli_query($link,$query1);
		while($row=mysqli_fetch_assoc($query_run1))
		{
			$new_upload = $row['uploads'] + 1;
			$query2 = "UPDATE users SET uploads='$new_upload' where username=(SELECT username from pics where pid='$picid')";
			$query_run2 = mysqli_query($link,$query2);
			if($query_run2)
			{
				echo 'YoYo!';
			}
		}
	}

	else
	{
		echo 'Oops';
	}


 ?>