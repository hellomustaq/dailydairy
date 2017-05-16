<?php 
	session_start();
	$weluser="";
	date_default_timezone_set("Asia/Dhaka");

	if (  !isset($_SESSION['reguser']) && !isset($_SESSION['user'])  ) {
		header('location:index.php');
	}else{
		if (isset($_SESSION['reguser']) ) {
			$tableName=$_SESSION['reguser'];
			$weluser= $_SESSION['reguser'];
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				$date=$_POST['date'];
				$day=$_POST['day'];
				$place=$_POST['place'];
				$highlight=$_POST['highlight'];
				$discription=$_POST['discription'];
				include 'dbconfig.php';
				$sql = "INSERT INTO  $tableName (entrydate, day, place, highlight, discription)
		            VALUES ('$date', '$day' ,'$place', '$highlight', '$discription')";

		            if (!mysqli_query($db,$sql)) {
		            	echo "error " .$sql. "<br>" . mysqli_error($db);
		            }
		        mysqli_close($db);
			}
		}else{
			$weluser= $_SESSION['user'];
			$tableName=$_SESSION['user'];
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				$date=$_POST['date'];
				$day=$_POST['day'];
				$place=$_POST['place'];
				$highlight=$_POST['highlight'];
				$discription=$_POST['discription'];
				include 'dbconfig.php';
				$sql = "INSERT INTO  $tableName (entrydate, day, place, highlight, discription)
		            VALUES ('$date', '$day' ,'$place','$highlight', '$discription')";

		            if (!mysqli_query($db,$sql)) {
		            	echo "error " .$sql. "<br>" . mysqli_error($db);
		            }
		        mysqli_close($db);
            header('location:showdata.php');
			}

		}

	}
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style>
 		@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        -o-font-smoothing: antialiased;
        font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
      }

      body {
        font-family: cursive;
        font-weight: 100;
        font-size: 12px;
        line-height: 30px;
        color: #777;
        background: rgb(142, 6, 31);
      }
      .nav{
      	width: 100%;
      	box-shadow:20px 12px 20px 3px rgba(0, 0, 0, 0.2);
      }
      .option{
      	min-height: 95px;
      	background-color: #ff5f5f;
      	width: 100%;
      	margin: 0 auto;
      }
      .option ul{
      	margin-left: 260px;
      }
      .option a {
      	text-decoration: none;
          padding: 10px 30px 10px 30px;
          margin: 0px;
          background-color: #ff9166;
          text-align: center;
          font-size: large;   
          border-radius: 3px;
          color: white;
          box-shadow: 1px 5px 18px 0px #615c5c;
      }
      .nav .option ul li{
      	text-align: center;
      	list-style: none;
      	margin-top: 30px;
      	float: left;
      	margin-left: 70px;
      }
      #a1{
      	background-color: #328eb7;
      }
      #a2{
      	background-color: rgb(24, 195, 93);
      }
      #a3{
      	background-color: #dccb00;
      }
      #a4{
      	background-color: #a28989;
      }

      .container {
        max-width: 650px;
        width: 100%;
        margin: 0 auto;
        position: relative;
      }

      #contact input[type="text"],
      #contact input[type="email"],
      #contact input[type="tel"],
      #contact input[type="url"],
      #contact textarea,
      #contact button[type="submit"] {
        font: 400 12px/16px;
         font-family: cursive;
      }

      #contact {
        background: #F9F9F9;
        padding: 25px;
        margin: 40px 0;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }

      #contact h3 {
        display: block;
        font-size: 30px;
        font-weight: 300;
        margin-bottom: 10px;
      }

      #contact h4 {
        margin: 5px 0 15px;
        display: block;
        font-size: 13px;
        font-weight: 400;
      }

      fieldset {
        border: medium none !important;
        margin: 0 0 10px;
        min-width: 100%;
        padding: 0;
        width: 100%;
      }

      #contact input[type="text"],
      #contact input[type="email"],
      #contact input[type="tel"],
      #contact input[type="url"],
      #contact textarea {
        width: 100%;
        border: 1px solid #ccc;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px;
      }

      #contact input[type="text"]:hover,
      #contact input[type="email"]:hover,
      #contact input[type="tel"]:hover,
      #contact input[type="url"]:hover,
      #contact textarea:hover {
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 1px solid #aaa;
      }

      #contact textarea {
        height: 100px;
        max-width: 100%;
        resize: none;
      }

      #contact button[type="submit"] {
        cursor: pointer;
        width: 100%;
        border: none;
        background: #4CAF50;
        color: #FFF;
        margin: 0 0 5px;
        padding: 10px;
        font-size: 15px;
      }

      #contact button[type="submit"]:hover {
        background: #43A047;
        -webkit-transition: background 0.3s ease-in-out;
        -moz-transition: background 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
      }

      #contact button[type="submit"]:active {
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
      }

      .copyright {
        text-align: center;
      }

      #contact input:focus,
      #contact textarea:focus {
        outline: 0;
        border: 1px solid #aaa;
      }

      ::-webkit-input-placeholder {
        color: #888;
      }

      :-moz-placeholder {
        color: #888;
      }

      ::-moz-placeholder {
        color: #888;
      }

      :-ms-input-placeholder {
        color: #888;
      }
 	</style>
 </head>


 <body>
	 <div class="nav">
	 	<div class="option">
		 	<ul>
		 		<li><a id="a1" href="#">Home</a></li>
				<li><a id="a2" href="showdata.php">My Days</a></li>
				<li><a id="a3" href="mainpage.php">Tnsert</a></li>
				<li><a id="a4" href="logout.php">Logout</a></li>
		 	</ul>
	 	</div>
	 </div>
 <div class="container">
 	<?php echo "Welcome " .$weluser; ?>  
  <form id="contact" action="" method="post">
    <h3>Today's Entry</h3>
    <fieldset>
      <input name="date" type="text" tabindex="1" value="<?php echo date("Y/m/d");?>" required autofocus>
    </fieldset>
    <fieldset>
      <input name="day" placeholder="Day" type="text" value="<?php echo date("l");?>" tabindex="2" required >
    </fieldset>
    <fieldset>
      <input name="place" placeholder="Place" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input name="highlight" placeholder="Highlight" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>
      <textarea name="discription" placeholder="Type your activity here...." tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
 </body>
 </html>