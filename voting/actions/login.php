<?php
session_start();
include('connect.php');

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$std = $_POST['std'];

$sql = "SELECT * FROM `userdata` WHERE username='$username' AND mobile='$mobile' AND standard='$std'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);

    // Verify password
    if (password_verify($password, $data['password'])) {
        // Password is correct
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        // Define the election date (this is just an example, replace it with your actual election date)
        $electionDate = strtotime("7 may  2024");

        // Get the current date
        $currentDate = strtotime(date("Y-m-d"));

        // Check if the current date is before, on, or after the election date
        if ($currentDate < $electionDate) {
            // Election is in the future
            $electionStatus = "Elections will be soon.";
        } elseif ($currentDate == $electionDate) {
            // Election is today
            $electionStatus = ""; // No message needed if election is today
        } else {
            // Election has passed
            $electionStatus = "Elections have completed.";
        }

        // Display appropriate message based on election status
        if ($electionStatus !== "") {
            echo '<script>
                    alert("' . $electionStatus . '");
                    window.location="../";
                  </script>';
            exit;
        }

        // Retrieve group data from the database and store it in the session
        $sql = "SELECT username, photo, votes, id FROM `userdata` WHERE standard = 'group'";
        $resultgroup = mysqli_query($con, $sql);

        if (mysqli_num_rows($resultgroup) > 0) {
            $groups = mysqli_fetch_all($resultgroup, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        }

        echo '<script>
                window.location="../partials/dashboard.php";
              </script>';
        exit;
    } else {
        // Password is incorrect
        echo '<script>
                alert("Invalid credentials");
                window.location="../";
              </script>';
        exit;
    }
} else {
    // No matching user found
    echo '<script>
            alert("Invalid credentials");
            window.location="../";
          </script>';
    exit;
}
?>
