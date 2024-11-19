<?php
session_start();  

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Database</h2>
        <a class="btn btn-primary" href="avian_database.php" role="button">Avian Database</a>
        <a class="btn btn-danger btn-sm" href="logout.php">Log out</a>
    </div>
</body>
</html>
