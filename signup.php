<?php
    session_start();
    include 'function.php';
    $rfirstname=$rlastname=$rusername=$remail=$rcountry=$rgender=$rpassword=$rerror=$duplicateuser=$duplicateemail="";

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $rfirstname=validator($_POST['fname']);
        $rlastname=validator($_POST['lname']);
        $rusername=validator($_POST['uname']);
        $remail=validatorPass($_POST['email']);
        $rcountry=validator($_POST['country']);
        $rgender=validator($_POST['gender']);
        $rpassword=validatorPass($_POST['password']);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dailydairy";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $usernamequery="SELECT user_name FROM registermember WHERE user_name='$rusername'";
        $emailquery="SELECT email FROM registermember WHERE email='$remail'";

        $usernamequerystore=mysqli_query($conn,$usernamequery);
        $emailquerystore=mysqli_query($conn,$emailquery);

        $countrowusername=mysqli_num_rows($usernamequerystore);
        $countrowemail=mysqli_num_rows($emailquerystore);
          
          if ($countrowusername > 0) {
            $duplicateuser="*this user name already taken";
          }
          elseif ($countrowemail > 0) {
            $duplicateemail="*this email already taken";
          }
          else {
              $sql = "INSERT INTO registermember (first_name, last_name, user_name, email, country, gender, password)
              VALUES ('$rfirstname', '$rlastname' ,'$rusername', '$remail', '$rcountry', '$rgender', '$rpassword')";
                if (mysqli_query($conn, $sql)) {
                    $rerror= "successful";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
             
              $_SESSION['reguser']=$rusername;
              $createtable=$_SESSION['reguser'];
              $createtableVAR = "CREATE TABLE $createtable (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                      entrydate VARCHAR(30) NOT NULL,
                      day VARCHAR(30) NOT NULL,
                      place varchar(30),
                      highlight varchar(300),
                      discription VARCHAR(1500) NOT NULL  
                      )";

                  if (mysqli_query($conn, $createtableVAR)) {
                      echo "Table MyGuests created successfully";
                  } else {
                      echo "Error creating table: " . mysqli_error($conn);
                  }
              mysqli_close($conn);
              header('location:afterregistration.php');
          }
        }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
          background-color: #36716a;
          font-family: cursive;
          color: #ff5f5f;
        }
        .bgimg{
            background-color: gray;
        }
        body{

        }
        .content{
            position: absolute;
            margin: 0 auto;
        }
         h2 {
            margin-left: 204px;
            color: #e2ff00;
            font-weight: bolder;
        }
        #head1{
            margin-left: 204px;
            font-weight: bolder;
        }
        #headp{
              margin-left: 220px;
        }


        tr,td{
            padding: 10px;
            color: #e2ff00;
            font-size:25px;
            font-style: oblique;
            font: bold;
            font-weight: bolder;
        }
        form {
            /* width: 100%; */
            /* margin: 100px 300px; */
            margin-left: 400px;
            margin-top: 55px;
        }
        input[type="text"],input[type="email"],select {
            height: 25px;
            width: 328px;
            /*border-radius: 10px;*/
            background-color: #ffffff;
            color: #09c74e;
            font-weight: bold;
            font-family: cursive;
        }
        .butt{
            margin: 30px 210px;
        }
        input[type="submit"],input[type="reset"]{
            padding: 10px 30px;
            background-color: #31d67a;
            border-radius: 10px;
            box-shadow: 6px 6px 5px #7f927d;
            font-family: cursive;
            font-weight: bold;
            color: #b50606;
        }
        input[type="reset"]{
            background-color: #64a8d8;
        }
        input[type="password"] {
            height: 25px;
            width: 328px;
            /*border-radius: 10px;*/
            background-color: #ffffff;
            color: #09c74e;
            font-weight: bold;
            font-family: cursive;
        }

         h3 {
            margin-left: 618px;
            color: #e2ff00;
        }
        h3 a{
            color: #ff5f5f;        }

        @media screen and (max-width:400px){
            .bgimg{
                background-color: #eae85e;;
                background-image: none;
                float: left;
                position: relative;
                height: 547px;
                filter: blur(0)
        }
            td{
                padding: 5px;
                color: rgb(83, 122, 83);
                font-size:15px;
                font-style: oblique;
                font: bold;
                font-weight: bolder;
        }
            tr{
                width: 100%;
                color: rgb(83, 122, 83);
                font-size:15px;
                font-style: oblique;
                font: bold;
                font-weight: bolder;
        }
            form {
                margin: 20px 10px;
        }

            input[type="text"],input[type="email"],select {
                height: 20px;
                width: 150px;
                border-radius: 5px;
                background-color: #c7c7d0;
        }
            input[type="submit"],input[type="reset"]{
                padding: 8px 20px;
                background-color:  #19c239;
                border-radius: 7px;
                box-shadow: none;
        }
            h2 {
                margin-left: 5px;
                color: #19c239;;
                font-weight: bolder;
        }
            h3 {
                margin:0 15px;
                color: rgb(83, 122, 83);
        }
            h3 a{
                color: rgb(83, 122, 83);
        }
            .butt {
                margin: 30px 100px;
        }
        }
    </style>
</head>
<body >
   <div class="content">
     <form action="" method="post">
          <!-- <h4><?php echo $rerror; ?></h4> -->
         <h1 id="head1">Daily Dairy</h1>
         <p id="headp">Sign up for yours!!</p>
      <table>
          <tr>
          </tr>
          <tr></tr>
          <tr>
              <td>First Name</td>
              <td>: <input type="text" name="fname" placeholder="Enter Fname" required <?php echo $rfirstname; ?>></td>
          </tr>
             <tr>
              <td>Last Name</td>
              <td>: <input type="text" name="lname" placeholder="Enter Lname" required <?php echo $rlastname; ?>></td>
          </tr>
             <tr>
              <td>User Name</td>
              <td>: <input type="text" name="uname" placeholder="Enter Uname" required></td>
              <td><?php echo $duplicateuser; ?></td>
          </tr>
             <tr>
              <td>E-mail</td>
              <td>: <input type="email" name="email" placeholder="Enter your email" required></td>
              <td><?php echo $duplicateemail; ?></td>
          </tr>
          <tr>
              <td>Password</td>
              <td>: <input type="password" name="password" placeholder="Enter your password" required></td>
          </tr>
          <tr>
              <td>country</td>
              <td>: <select name="country" required>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="USA">USA</option>
                  <option value="Canada">Canada</option>
                  <option value="England">England</option>
              </select></td>
          </tr>
          <tr>
              <td>Gender</td>
              <td> : <input type="radio" name="gender" value="Male" checked>Male <input type="radio" name="gender" value="Female">Female</td>
          </tr>

      </table>
          <div class="butt">
              <input type="submit" name="submit" value="Done">
              <input type="reset">
          </div>
     </form>
     <h3>Have a account? <a href="index.php">Log In</a></h3><br>

   </div>

</body>
