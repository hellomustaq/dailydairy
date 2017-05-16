<?php 
	session_start();
	$username="";
	$password="";
	$errmassage="";
	include 'function.php';
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$email = validatorPass($_POST['email']);
		$password = validatorPass($_POST['Password']);

		$servername = "localhost";
        $hostusername = "root";
        $hostpassword = "";
        $dbname = "dailydairy";
        $conn = mysqli_connect($servername, $hostusername, $hostpassword, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
		$search= "SELECT email,password from registermember WHERE email='$email' AND password='$password'";
		$result=mysqli_query($conn,$search);
		$checkrow=mysqli_num_rows($result);
        if ($checkrow > 0) {
			//$cookie=setcookie("$username",md5('$password'), date("Y/m/d")+7200,"/");
			$searchUserName="SELECT user_name from registermember WHERE email='$email' AND password='$password'";
			$searchUserNameResult=mysqli_query($conn,$searchUserName);
			$row = mysqli_fetch_array($searchUserNameResult);
			$searchUserNameResult=$row['user_name'];
			$_SESSION['user']=$searchUserNameResult;
			header("location:mainpage.php");
		}
		else{
			$errmassage="email or password incorrect";
		}
		$conn->close();
	}

	



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color: #36716a;
			font-family: cursive;
			color: #ff5f5f;
			background-image: url(dairy.jpg);
			background-repeat: no-repeat;
		    background-position: right top;
		    background-attachment: fixed;
            background-size:100%;
            width: 99%;
            height: 500px;


		}
		.container{
			width: 40%;
			margin: 0 auto;
			border-radius: 10px;
			margin-top: 120px;
		}
		.maincon{
			margin: 0 auto;
			text-align: center;
			min-height: 300px;
			max-width: 100%;
    		background-color: rgba(30, 64, 27, 0.5);
    		border-radius: 5px;
		}
		#bgimage{

		}
		table {
   			 margin: 0 auto;
		}
		input[type="email"] {
			 font-family: cursive;
			 font-weight: 13px;
   			 padding: 5px 20px;
   			 border-radius: 10px;
   			 background-color: #f2f2f2;
		}
		input[type="password"] {
   			 padding: 5px 20px;
   			 border-radius: 10px;
   			 background-color: #f2f2f2;
   			 font-family: cursive;
		}
		#loginlayout td{
		}
		#td1 {
		    font-size: 18px;
		    font-family: cursive;
		    font-style: bolder;
		    font: 400;
		    font-weight: bold;
		    text-align: right;
		}
		#td2{
			padding: 10px 10px 10px 0px;
		}
		#btn1{
			font-weight: bolder;
			font-size: 15px;
		    font-family: cursive;
		    padding: 10px 137px;
    		margin-left: -1px;
    		margin-bottom: 5px;
    		background-color: #31d67a;
    		border: 0;
    		border-radius: 10px;
		}
		#btn2{
		    font-weight: bolder;
			font-size: 15px;
		    font-family: cursive;
			padding: 10px 133px;
		    border: 0;
		    background-color: #64a8d8;
		    border-radius: 10px;
		}
	</style>
</head>
<body>
	<div id="bgimage">
		<div class="container">
			<div class="maincon">
				<div class="intro">
					<h1>Welcome To Daily Dairy</h1>
				</div>
				<div class="frm">
					<form action="" method="post">
						<table id="loginlayout">
							<tr>
								<td id="td1">E-mail: </td>
								<td id="td2"><input type="email" name="email" placeholder="enter email" required></td>
							</tr>
							<tr>
								<td id="td1">Password: </td>
								<td id="td2"><input type="Password" name="Password" placeholder="enter password" required></td>
							</tr>
						</table>
						<input id="btn1" type="submit" name="submit" value="Login"><br>
					</form>
						<a href="signup.php"><input id="btn2" type="button" name="signup" value="Signup"></a><br>
						<?php echo "<style='color:red'> $errmassage</style>" ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>