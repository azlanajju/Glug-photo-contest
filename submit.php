<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background: black;
        }
        .card {
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
        }

        /* CSS for success message */
        .success {
            color: green;
            font-weight: bold;
            font-size: 50px;
            
        }

        /* CSS for error message */
        .error {
            color: red;
            font-weight: bold;
            font-size: 50px;
            
        }
        .home a{
            text-decoration: none;
            padding: 10px 15px;
            background: greenyellow;
            color: black;
            font-size: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        include ('./config.php');

        $msg = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $college = $_POST['college'];
            $photo_title = $_POST['photo_title'];
            $transaction_id = $_POST['transaction_id'];

            $target_dir = "uploads/";
            $photo_upload = $target_dir . basename($_FILES['photo_upload']['name']);
            move_uploaded_file($_FILES['photo_upload']['tmp_name'], $photo_upload);

            $transaction_ssn = $target_dir . basename($_FILES['transaction_ssn']['name']);
            move_uploaded_file($_FILES['transaction_ssn']['tmp_name'], $transaction_ssn);

            $sql = "INSERT INTO registration (full_name, email, phone, college, photo_title, transaction_id, photo_upload, transaction_ssn)
                    VALUES ('$full_name', '$email', '$phone', '$college', '$photo_title', '$transaction_id', '$photo_upload', '$transaction_ssn')";

            if ($conn->query($sql) === TRUE) {
                $msg = "Registration successful!";
                echo '<p class="success">' . $msg . '</p>';
            } else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
                echo '<p class="error">' . $msg . '</p>';
            }

            $conn->close();
        }

        ?>

        <div class="home"><a href="./index.html">Return Home</a></div>
    </div>
</body>
</html>
