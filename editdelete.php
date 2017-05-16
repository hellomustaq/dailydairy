<?php 
	session_start();
	if (!isset($_SESSION['user']) && !isset($_SESSION['reguser'])) {
		header('location:index.php');
	}

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (isset($_POST['editdata'])) {
			$_SESSION['getidforupdate']=$_POST['idcheck'];
			header('location:editentry.php');
		}else{
			if (isset($_POST['deletedata'])) {
			$_SESSION['getidforupdate']=$_POST['idcheck'];
			header('location:deleteentry.php');
		}
		}
	}

 ?>