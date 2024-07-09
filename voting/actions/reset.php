<?php
include('connect.php');

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if ($password != $cpassword) {
    echo '<script>
    alert("Passwords do not match");
    window.location="../index.php";
    </script>';
} else {
    // Encrypt the password
    $encpassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user exists
    $check_sql = "SELECT * FROM `userdata` WHERE username='$username' AND mobile='$mobile'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Update the password
        $update_sql = "UPDATE `userdata` SET password='$encpassword' WHERE username='$username' AND mobile='$mobile'";
        $update_result = mysqli_query($con, $update_sql);

        if ($update_result) {
            echo '<script>
            alert("Password reset successfully");
            window.location="../index.php";
            </script>';
        } else {
            echo '<script>
            alert("Failed to reset password. Please try again.");
            window.location="../index.php";
            </script>';
        }
    } else {
        echo '<script>
        alert("User not found. Please check your credentials.");
        window.location="../index.php";
        </script>';
    }
}
?>
