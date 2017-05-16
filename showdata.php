<?php

    session_start();
    if (!isset($_SESSION['user']) && !isset($_SESSION['reguser'])) {
        header("location:index.php");
    }else{
        if (isset($_SESSION['user'])) {
            include ('dbconfig.php');
            if (!$db) {
                die("connection failed ".mysqli_connect_error());
            }
            $table=$_SESSION['user'];
            $query=mysqli_query($db,"SELECT id,entrydate,day,place,highlight,discription from $table");
            //$insert=mysqli_fetch_array($query);
            $countrow=mysqli_num_rows($query);


        }else{

        }
        
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History</title>
    <link rel="stylesheet" href="btrap/css/bootstrap.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
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
}
    </style>
    <script>
        function delete_id(id){
             if(confirm('Sure To Remove This Record ?'))
             {
                window.location.href='editdelete.php';
             }
        }
</script
    </script>
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
    <div class="clear" style="clear: both;"></div><br><br>
    <div class="container">
        <div class="admin_area">
            <form action="" method="post">
                <table width="800" border="1" cellpadding="5" cellspacing="0" class="table table-bordered table-hover table-striped table-condensed">
                    <tr>
                        <th colspan="6" scope="col" class="text-center success">Privious Memory</th>
                    </tr>
                    <tr>
                        <th class="text-center info">Date</th>
                        <th class="text-center info">Day</th>
                        <th class="text-center info">place</th>
                        <th class="text-center info">Highlight</th>
                        <th class="text-center info">Discription</th>
                        <th class="text-center info">Action</th>
                    </tr>
                    <tr>
 <?php
    If ($countrow > 0) {
        while ($insert=mysqli_fetch_array($query)) {
            ?>

            <tr>
                <td><?php echo $insert['entrydate']; ?></td> 
                <td><?php echo $insert['day']; ?></td> 
                <td><?php echo $insert['place']; ?></td> 
                <td><?php echo $insert['highlight']; ?></td> 
                <td><?php echo $insert['discription']; ?></td> 
                <td>
                    <form action="editdelete.php" method="post">
                         <button class="btn btn-sm btn-primary glyphicon glyphicon-pencil"  type="submit" name="editdata"></button>
                         <button type="submit" name="deletedata" class=" btn btn-sm btn-danger glyphicon glyphicon-remove"></button>
                         <input type="hidden" name="idcheck" value="<?php echo $insert['id'];?>">
                    </form>
                </td>
            </tr>
            <?php
            }
        }
        mysqli_close($db);
        ?>
                    </tr>
                    <tr>
                        <th colspan="6">
                            <a href="#" class="btn btn-primary">Add Admin</a>
                            
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>