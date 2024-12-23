<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Register</h2>
    <form class="mx-auto mt-4" style="max-width: 500px;" method="POST" action="">
        <div class="mb-3">
            <label for="matric" class="form-label">Matric</label>
            <input type="text" class="form-control" id="matric" name="matric" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
       
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="Student">Student</option>
                <option value="Lecturer">Lecturer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100" name="submit">Register</button>
    </form>
    <div class="text-center mt-3">
        <a href="User_Login.php"> have an account? Login here</a>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $matric = $_POST['matric'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (matric, name , role, password) VALUES ('$matric', '$name', '$role', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Registration successful!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
