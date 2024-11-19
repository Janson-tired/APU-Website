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
    <title>Database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of avians</h2>
        <a class="btn btn-primary" href="create.php" role="button">New Avian</a>
        <a class="btn btn-danger btn-sm" href="database.php">Return</a>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Avian ID</th>
                    <th>Avian Name</th>
                    <th>Avian Size</th>
                    <th>Image name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "tourist_site_db";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM avians";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['Avian ID']}</td>
                            <td>{$row['Avian Name']}</td>
                            <td>{$row['Avian Size']}</td>
                            <td>{$row['Image name']}</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?db_id={$row['Avian ID']}'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?db_id={$row['Avian ID']}'>Delete</a>
                            </td>
                        </tr>
                        ";                                              
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
</html>