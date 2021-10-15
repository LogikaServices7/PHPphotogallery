<?php 

	$host="localhost";
	$user="root";
	$password="";


	
    $link= mysqli_connect("localhost","root","","photogallery");
    
    $db= mysqli_select_db($link,"photogallery");

    if($db)
    {
    	echo "ok!";
    }
    else{
    	echo "oh no!";
    }
    
    
    

	


 ?>