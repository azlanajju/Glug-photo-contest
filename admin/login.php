<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <?php
                        include ("../config.php");

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            // Sample database connection and query, replace with your authentication logic
                            $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {

                                 session_start();

                                $row = $result->fetch_assoc();
                                $_SESSION['user_id'] = $row['admin_id'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['full_name'] = $row['full_name'];

                                header("Location: index.php"); 
                            } else {
                                echo '<div class="alert alert-danger" role="alert">
                                        Login failed. Please check your credentials.
                                      </div>';
                            }
                        }
                        ?>
                        <form method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
