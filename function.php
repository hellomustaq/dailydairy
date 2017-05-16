<?php 
	
	function validator($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$data = ucfirst($data);
		return $data;
	}
	function validatorPass($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	function dbcon($server,$user,$pass,$database){
		$conn=mysqli_connect($server,$user,$pass,$database);
		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
	}

 ?>