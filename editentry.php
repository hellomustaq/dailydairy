<?php 
session_start();
    if (!isset($_SESSION['user']) && !isset($_SESSION['reguser'])) {
        header("location:index.php");
    }else{
            
                include ('dbconfig.php');
                if (!$db) {
                    die("connection failed ".mysqli_connect_error());
                }
    			$getid=$_SESSION['getidforupdate'];
    			$tableselect=$_SESSION['user'];
    			$sqlsearch="SELECT * from $tableselect where id='$getid'";
    			$getdatafromtergetid=mysqli_query($db,$sqlsearch);
    			if (!mysqli_query($db,$sqlsearch)) {
    		            	echo "error " .$sqlsearch. "<br>" . mysqli_error($db);
    		            }
    			$getdatafromtergetid1=mysqli_fetch_array($getdatafromtergetid);
    			
    			if ($_SERVER["REQUEST_METHOD"]=="POST") {
    				$updatedate=$_POST['date'];
    				$updateday=$_POST['day'];
    				$updateplace=$_POST['place'];
    				$updatehighlight=$_POST['highlight'];
    				$updatediscription=$_POST['discription'];
    				$sqlupdate="UPDATE $tableselect SET entrydate='$updatedate', day='$updateday', place='$updateplace', highlight='$updatehighlight', discription='$updatediscription' WHERE id ='$getid'";
    				$sqlquery=mysqli_query($db,$sqlupdate);
    				if (!$sqlquery) {
    		            	echo "error " .$sqlquery. "<br>" . mysqli_error($db);
    		            }
            mysqli_close($db);
            header('location:showdata.php');
			}

	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
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
        font-size: 14px;
        line-height: 30px;
        color: #777;
        background: rgb(142, 6, 31);
      }

      #contact input[type="text"],
      #contact button[type="submit"] {
        font: 400 12px/16px;
         font-family: cursive;
      }

      #contact {
        background: #ff5f5f;
        padding: 25px;
        margin: 40px 0;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        width: 40%;
    	margin: auto;
      }

      #contact h3 {
        display: block;
        font-size: 30px;
        font-weight: 300;
        margin-bottom: 10px;
        color: white;
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

      #contact input[type="text"]{
        width: 100%;
        border: 1px solid #ccc;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px;
      }
      .spacialfield{
      	height: 140px;
      	margin: 0;
      	padding: 0;
      }

      #contact input[type="text"]:hover{
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 2px solid #1188ff;
      }
      #contact button[type="submit"] {
        cursor: pointer;
        width: 100%;
        border: none;
        background: #8e061f;
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
      #contact input:focus,
      #contact textarea:focus {
        outline: 0;
        border: 1px solid #aaa;
      }
              .nav{
            width: 100%;
            /*box-shadow:20px 12px 20px 3px rgba(0, 0, 0, 0.2);*/
        }
        .option{
            min-height: 95px;
            background-color: #ff5f5f;
            width: 100%;
            margin: 0 auto;
            padding-top: 4px;
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
	</style>
</head>
<body>
	    <div class="nav">
        <div class="option">
            <ul>
                <li><a id="a1" href="#">Home</a></li>
                <li><a id="a2" href="showdata.php">My Days</a></li>
                <li><a id="a3" href="mainpage.php">Insert</a></li>
                <li><a id="a4" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
	<br>
	<form id="contact" action="" method="post">
    <h3>Update Your Day</h3>
    <fieldset>
      <input name="date" type="text" tabindex="1" value="<?php echo $getdatafromtergetid1['1'];?>" required autofocus>
    </fieldset>
    <fieldset>
      <input name="day" placeholder="Day" type="text" value="<?php echo $getdatafromtergetid1['2'];?>" tabindex="2" required >
    </fieldset>
    <fieldset>
      <input name="place" placeholder="Place" type="text" tabindex="2" required value="<?php echo $getdatafromtergetid1['3'];?>">
    </fieldset>
    <fieldset>
      <input name="highlight" placeholder="Highlight" type="text" tabindex="3" required value="<?php echo $getdatafromtergetid1['4'];?>">
    </fieldset>
    <fieldset>
       <input type="text" class="spacialfield" value="<?php echo $getdatafromtergetid1['5'];?>" name="discription" placeholder="Type your activity here...." tabindex="15" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</body>
</html>