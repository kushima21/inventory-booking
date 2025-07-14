<?php
include('dbconnect.php');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard</title>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <div class="login-main-container">
        <div class="login-container">
            <div class="login-header">
                <img src="logo.png"><h1>Welcome to LSSTI Booking</h1>
            </div>
            <div class="login-form-box">
                <form method="" action="">
                    <label for="email">Email:</label>
                    <br>
                    <i class="fas fa-envelope"></i><input type="email" id="email" name="email" placeholder="Email" required>
                    <br>
                    <label for="password">Password:</label>
                    <br>
                    <i class="fas fa-lock"></i><input type="password" id="password" name="password" placeholder="Password" required>

                    <div class="login-button">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
                <div class="home-box">
                    <ul>
                        <a href="#"><li><i class="fas fa-home"></i><span>Home</span></li></a>
                        <a href="index_register.php"><li><i class="fas fa-person"></i><span>Create Account</span></li></a>
                    </ul>
                </div>
                <div class="footer">
                    <p>&copy; 2023 LSSTI Booking. All rights reserved.</p>
                </div>
            </div>

        </div>
        <div class="login-right-container">
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
        </div>
    </div>
</body>
</html>
