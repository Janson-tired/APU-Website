<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/login_style.css" />
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Admin Login</h1>

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required />
                <i class="bx bx-user"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required />
                <i class="bx bxs-lock-alt"></i>
            </div>

            <div class="remember-forgot">
                <label> <input type="checkbox" />Remember Me </label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" name="login" class="btn">Login</button>
        </form>
    </div>
</body>
</html>

<?php
session_start();

// Define user credentials and redirect page
$admin_username = "admin_user";
$admin_password = "admin_password";
$admin_page = "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the provided credentials are valid
    if ($username === $admin_username && $password === $admin_password) {
        // Set session variables
        $_SESSION["logged_in"] = true;

        // Redirect to the specific page
        header("Location: " . $admin_page);
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

