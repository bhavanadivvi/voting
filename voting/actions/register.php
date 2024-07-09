<?php
include('connect.php');
$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$std = $_POST['std'];
if (empty($username) || empty($mobile) || empty($password) || empty($cpassword) || empty($std) || empty($image)) {
    echo '<script>
    alert("Please fill in all the fields");
    window.location="../partials/registration.php";
    </script>';
}

elseif ($password != $cpassword) {
    echo '<script>
    alert("Passwords do not match");
    window.location="../partials/registration.php";
    </script>';
} else {
    // Encrypt the password
    $encpassword = password_hash($password, PASSWORD_DEFAULT);

    move_uploaded_file($tmp_name, "../uploads/$image");
    $sql = "INSERT INTO `userdata` (username, mobile, password, photo, standard, status, votes) 
            VALUES ('$username', '$mobile', '$encpassword', '$image', '$std', 0, 0)";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo '<script>
        alert("Registration Successful");
        window.location="../";
        </script>';
    } else {
        die(mysqli_error($con));
    }
}
?>
