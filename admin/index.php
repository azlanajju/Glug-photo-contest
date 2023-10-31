<?php
// Start or resume the session
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}

?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ('../config.php');

// Query to retrieve image information from the database
$sql = "SELECT * FROM registration";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <style>
        .cont{
            width: 95vw;
            background: transparent;
        }
        .container h1{
            color: blueviolet;
        }
        .card img{
            height: 200px;
            object-fit: cover;
        }
        .card{
            box-shadow: 5px 5px 5px black;
        }
        a:hover{
            color: black;
        }
    </style>
                    <div class="card">
                    <div class="card-header">
                        Welcome, <?php echo $_SESSION['username']; ?>
                    </div>
                    <div class="card-body">
                        <p>This is a protected page that can only be accessed by authenticated users.</p>
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
    <div class="container cont">
        <h1>Image Gallery</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <a style="text-decoration: none;" href="./oneDetail.php?id=<?php echo $row['id']; ?>">
                    <div class="card">
                    <img src="<?php echo '../'. $row['photo_upload']; ?>" class="card-img-top" alt="<?php echo $row['photo_title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['photo_title']; ?></h5>
                        <p class="card-text">Uploaded by: <?php echo $row['full_name']; ?></p>
                    </div>
                </div>
                    </a>
            </div>
            <?php
                }
            } else {
                echo "No images found in the database.";
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
