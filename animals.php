<?php include 'includes/header.php'; ?>

<div class="header-and-logo">
    <h1>Animals</h1>
    <a href="index.php"><div class="logo"></div></a>
</div>

<div class="Avian-wrapper">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tourist_site_db";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `Avian ID`, `Avian Name`, `Avian Size`, `Image name` FROM avians";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='avians'>";
            echo "<h3>" . $row['Avian Name'] . "</h3>";
            echo "<p>Size: " . $row['Avian Size'] . "</p>";
            echo "<img src='images/" . $row['Image name'] . "' alt='" . $row['Avian Name'] . "'>";
            echo "</div>";
        }
    } else {
        echo "No avians found.";
    }

    $conn->close();
    ?>
</div>

<?php include 'includes/footer.php'; ?>
