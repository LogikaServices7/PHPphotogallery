<?php 

	$picid = $_POST['id'];
	include 'inc/db.inc.php';
	//$approved =1;

	$link= mysqli_connect("localhost","root","","photogallery");
	$query = "delete from pics where pid='$picid'";
	$query_run = mysqli_query($link,$query);

	if($query_run)
	{
		echo 'Deleted';
	}

	else
	{
		echo 'Oops';
	}


 ?>