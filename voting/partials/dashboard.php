<?php
session_start();
if(!isset($_SESSION['id'])){
    header('location:../');
}
$data=$_SESSION['data'];
if($_SESSION['status']==1){
    $status='<b class="text-success">Voted</b>';
}
else{
    $status='<b class="text-danger">Not Voted</b>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Voting System Dashboard</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- link style.css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .background-container {
            /* Set background image */
            background-image: url('../images/bg1.jpg');
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* Apply blur effect */
            filter: blur(2px); /* Adjust the blur amount as needed */
            /* Optionally, you can adjust opacity for better contrast with text */
            opacity: 1;
            /* Position the container behind other content */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }
        .content-container {
            /* Ensure content appears above the background */
            position: relative;
            z-index: 1;
        }
        </style>
</head>
<body >
<div class="background-container"></div>
    <div class="content-container">
    <div class="container my-5">
        <a href="../"><button class="btn btn-dark text-light px-3">Back</button></a>
        <a href="logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
        <a href="../results.php"><button class="btn btn-dark text-light px-3">Results</button></a>
        <h1 class="my-3">VOTING SYSTEM</h1>
        <div class="row my-5">
            <div class="col md-7">
                <?php
                if(isset($_SESSION['groups'])){
                   $groups=$_SESSION['groups'];
                   for($i=0;$i<count($groups);$i++){
                    ?>
                    <div class="row">
                    <div class="col md 4">
                        <img src="../uploads/<?php echo $groups[$i]['photo']?>"
                         alt="Group image">
                    </div>
                    <div class="col md-8">
                        <strong class="text-dark h5">Group name:</strong>
                        <?php echo $groups[$i]['username']?>
                        <br>
                        <strong class="text-dark h5">Votes:</strong>
                        <?php echo $groups[$i]['votes']?>
                        <br>
                    </div>
                </div>
               
                <form action="../actions/voting.php" method="POST">
                    <input type="hidden" name="groupvotes" value=" <?php echo $groups[$i]['votes']?>">
                    <input type="hidden" name="groupid" value=" <?php echo $groups[$i]['id']?>">
                    <?php
                    if($_SESSION['status']==1){
                        ?>

                        <button class="bg-success  my-3 text-white px-3">Voted</button>
                
                        <?php
                    }
                    else{
                        ?>
                        <button class="bg-danger my-3 text-white px-3" type="submit">Vote</button>
                        <?php

                    }
                    ?>
                </form>
                <hr> 
                <?php
                   }
                 }
                 else{
                    ?>
                    <div class="container">
                        <p>No Groups To Display</p>
                    </div>
                
                <?php
                 }
                ?>

                <!-- groups -->
                </div>
            <div class="col md-5">
                <!-- user profile -->
                <img src="../uploads/<?php echo $data['photo']?>" alt="User image">
                <br>
                <br>
                <strong class="text-dark h5">Name:</strong>
                <?php  echo $data['username'];?><br><br>
                <strong class="text-dark h5">Mobile:</strong>
                <?php  echo $data['mobile'];?><br><br>
                <strong class="text-dark h5">Status:</strong>
                <?php  echo $status;?><br><br>

            </div>
        </div>
    </div>
                </div>
</body>
</html>