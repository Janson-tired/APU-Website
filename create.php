<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourist_site_db";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = "";
$name = "";
$size = "";
$image_name = "";

$errorMessage = "";
$successMessage = "";

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourist_site_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $size = $_POST["size"];
    $image_name = $_POST["image_name"];

    do {
        // Validate input
        if (empty($id) || empty($name) || empty($size) || empty($image_name)) {
            $errorMessage = "All fields are required";
            break;
        }

        // Insert new avian into database
        $sql = "INSERT INTO avians (`Avian ID`, `Avian Name`, `Avian Size`, `Image name`)
                VALUES ('$id', '$name', '$size', '$image_name')";

        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Error: " . $conn->error;
            break;
        }

        // Clear the form inputs
        $id = "";
        $name = "";
        $size = "";
        $image_name = "";
        
        $successMessage = "Avian Added";

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
    <title>Add New Avian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>New Avian</h2>

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
                <label class="col-sm-3 col-form-label">Image name</label>
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
