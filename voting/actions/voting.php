<?php
session_start();
include('connect.php');
// Check if user has already voted
if ($_SESSION['status'] == 1) {
    echo '<script>
    alert("You have already voted.");
    window.location="../partials/dashboard.php";
    </script>';
    exit; // Exit to prevent further execution
}
$votes=$_POST['groupvotes'];
$totalvotes=$votes+1;

$gid=$_POST['groupid'];
$uid=$_SESSION['id'];

$updatevotes=mysqli_query($con,"update `userdata` set votes='$totalvotes' 
where id='$gid'");

$updatestatus=mysqli_query($con,"update `userdata` set status=1 
where id='$uid'");
if($updatevotes and $updatestatus){
    $getgroups=mysqli_query($con,"Select username,photo,votes,id from
    `userdata` where standard='group'");
    $groups=mysqli_fetch_all( $getgroups,MYSQLI_ASSOC);
    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;
    echo '<script>
    alert("Voting Succesful");
    window.location="../partials/dashboard.php";
    </script>';

}else{
    echo '<script>
    alert("Technical Error !! Vote after sometime");
    window.location="../partials/dashboard.php";
    </script>';
}

?>