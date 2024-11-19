<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourist_site_db";

$conn = new mysqli($servername, $username, $password, $dbname);

$db_id = "";
$id = "";
$name = "";
$size = "";
$image_name = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if db_id is present
    if (!isset($_GET["db_id"])) {
        header("location: avian_database.php");
        exit;
    }

    $db_id = $_GET["db_id"];

    // Fetch data from the database for the given id
    $sql = "SELECT * FROM avians WHERE `Avian ID` = '$db_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: avian_database.php");
        exit;
    }

    $id = $row["Avian ID"];
    $name = $row["Avian Name"];
    $size = $row["Avian Size"];
    $image_name = $row["Image name"];
} else {
    // POST request for form submission
    $db_id = $_POST["db_id"];
    $id = $_POST["id"];
    $name = $_POST["name"];
    $size = $_POST["size"];
    $image_name = $_POST["image_name"];

    do {
        if (empty($db_id) || empty($id) || empty($name) || empty($size) || empty($image_name)) {
            $errorMessage = "Cannot have empty fields";
            break;
        }

        // Update the avian information
        $sql = "UPDATE avians 
                SET `Avian ID` = '$id', `Avian Name` = '$name', `Avian Size` = '$size', `Image name` = '$image_name' 
                WHERE `Avian ID` = '$db_id'";

        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid data: " . $conn->error;
            break;
        }

        $successMessage = "Avian updated successfully";

        // Redirect to the database page after success
        header("location: avian_database.php");
        exit;

    } while (false);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Avian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Edit Avian</h2>

        <!-- Error Message -->
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <!-- Form -->
        <form method="post">
            <input type="hidden" name="db_id" value="<?php echo $db_id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Avian ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Avian Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Size</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="size" value="<?php echo $size; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Image Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="image_name" value="<?php echo $image_name; ?>">
                </div>
            </div>

            <!-- Success Message -->
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="avian_database.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
