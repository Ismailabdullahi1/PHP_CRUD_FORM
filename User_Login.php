<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Login</h2>
    <form class="mx-auto mt-4" style="max-width: 400px;" method="POST" action="">
        <div class="mb-3">
            <label for="matric" class="form-label">Matric</label>
            <input type="text" class="form-control" id="matric" name="matric" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-success w-100" name="login">Login</button>
    </form>
    <div class="text-center mt-3">
        <a href="User_Register.php">Don't have an account? Register here</a>
    </div>
    <?php
    if (isset($_POST['login'])) {
        $matric = $_POST['matric'];
        $password = $_POST['password'];

        // Query to fetch user data based on matric
        $sql = "SELECT * FROM users WHERE matric='$matric'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Store matric in session and redirect to dashboard
                $_SESSION['user'] = $user['matric'];
                header("Location: dashboard.php");
            } else {
                echo "<div class='alert alert-danger mt-3'>Invalid password.</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3'>User not found.</div>";
        }
    }
    ?>
</div>
</body>
</html>
