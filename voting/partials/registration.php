<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <h1 class=" text-center p-3">VOTING SYSTEM</h1>
    <div class="py-4">
        <h2 class="text-center">Register Account</h2>
        <div class="container text-center">
            <form action="../actions/register.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text"  class="form-control w-50 m-auto" name="username" placeholder="Enter Your User Name" require="required">
                    
                </div>
                <div class="mb-3">
                    <input type="text"  class="form-control w-50 m-auto" name="mobile" placeholder="Enter Your Mobile Number" require="required" maxLength="10" minLength="10">
                    
                </div>
                <div class="mb-3">
                    <input type="password"  class="form-control w-50 m-auto" name="password" placeholder="Enter Your Password" require="required">
                    
                </div>
                <div class="mb-3">
                    <input type="password"  class="form-control w-50 m-auto" name="cpassword" placeholder="confirm Password" require="required">
                    
                </div>
                <div class="mb-3">
                    <input type="file"  class="form-control w-50 m-auto" name="photo">
                    
                </div>
                <div class="mb-3">
                    <select name="std" class="form-select w-50 m-auto">
                        <option value="group">group</option>
                        <option value="voter">voter</option>
                    </select>
                </div >
                <button type="submit" class="btn btn-dark my-4">Register</button>
                <p>Already have an account <a href="../" class="text-white">Login here</a></p>
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>