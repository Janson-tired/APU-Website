<?php
if (isset($_GET["db_id"])) {
    $db_id = $_GET["db_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tourist_site_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM avians WHERE `Avian ID` = '$db_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

header("Location: avian_database.php");
exit;
?>
