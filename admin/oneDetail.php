<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('../config.php');

// Check if an image ID is provided in the URL
if (isset($_GET['id'])) {
    $image_id = $_GET['id'];

    // Query to retrieve all image details from the database based on the image ID
    $sql = "SELECT * FROM registration WHERE id = $image_id";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Image not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Image Details</title>
    <style>
        p img{
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Image Details</h1>
        <div class="card">
            <img src="<?php echo '../'.$row['photo_upload']; ?>" class="card-img-top" alt="<?php echo $row['photo_title']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['photo_title']; ?></h5>
                <p class="card-text">Uploaded by: <?php echo $row['full_name']; ?></p>
                <p class="card-text">Email: <?php echo $row['email']; ?></p>
                <p class="card-text">Phone: <?php echo $row['phone']; ?></p>
                <p class="card-text">College: <?php echo $row['college']; ?></p>
                <p class="card-text">Transaction ID: <?php echo $row['transaction_id']; ?></p>
                <p class="card-text">Transaction Screenshot:
                <img align="center" src="<?php echo '../'.  $row['transaction_ssn']; ?>" class="card-img-top" alt="<?php echo $row['photo_title']; ?>"></p>
                <p class="card-text">Registration Date: <?php echo $row['registration_date']; ?></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
