<?php 
	session_start();
	if (!isset($_SESSION['user']) && !isset($_SESSION['reguser'])) {
		header('location:index.php');
	}
	$getid=$_SESSION['getidforupdate'];
	$selecttable=$_SESSION['user'];
	include 'dbconfig.php';
	$sqlfordelete="DELETE FROM $selecttable where id='$getid'";
	$deletequery=mysqli_query($db,$sqlfordelete);
	if (!$deletequery) {
		echo "Error deleting record: " . mysqli_error($db);
	}else{
		echo "delete success";
	}
	mysqli_close($db);
 ?>