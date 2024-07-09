<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database server is different
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "votingsystem"; // Change this to your database name

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all groups data from the database
$getGroupsQuery = "SELECT username, photo, votes, id FROM `userdata` WHERE standard='group'";
$getGroupsResult = mysqli_query($con, $getGroupsQuery);

// Initialize an array to store group data
$groups = [];

// Fetch groups data and store in the array
while ($row = mysqli_fetch_assoc($getGroupsResult)) {
    $groups[] = $row;
}

// Sort groups by votes in descending order
usort($groups, function($a, $b) {
    return $b['votes'] - $a['votes'];
});

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
    <style>
        .background-container {
            /* Set background image */
            background-image: url('images/bg1.jpg');
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .group-photo {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="background-container"></div>
    <div class="content-container">
    <h2>Voting Results</h2>
    <table>
        <tr>
            <th>Group Name</th>
            <th>Photo</th>
            <th>Votes</th>
            <th>Winner</th>
        </tr>
        <?php foreach ($groups as $group): ?>
            <tr>
                <td><?php echo $group['username']; ?></td>
                <td><img src="uploads/<?php echo $group['photo']; ?>" alt="<?php echo $group['username']; ?>" class="group-photo"></td>
                <td><?php echo $group['votes']; ?></td>
                <td><?php echo $group === $groups[0] ? 'Winner' : ''; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
        </div>
</body>
</html>
