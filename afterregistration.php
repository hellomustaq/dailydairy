<?php 
	session_start();
	if (!isset($_SESSION['reguser'])) {
		header('location:index.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		body {
		    background-color: rgb(109, 4, 96);
		    font-family: cursive;
		}


		.maincon{
			width: 50%;
			margin: 0 auto;
			text-align: center;
			margin-top: 150px;
		}
		.maincon>h2{
			color: #0fbf36;
			font-family: cursive;

		}
		.maincon>a{
			text-decoration: none;
		}
		.maincon>a>span{
		    background-color: rgb(255, 110, 110);
		    padding: 12px;
		    border-radius: 4px;
		    color: honeydew;

		}
		#button{

		}
	</style>
</head>
<body>
	<div class="container">
		<div class="maincon">
			<h2>WELL DONE! Your Registration succesful!!</h2><br>
			<a href="mainpage.php"><span id="button">GOO &gt</span></a>
		</div>
	</div>
</body>
</html>