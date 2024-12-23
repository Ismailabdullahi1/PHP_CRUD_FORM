<?php include 'db.php'; session_start();
if (!isset($_SESSION['user'])) {
    header("Location: User_Login.php");
    exit;
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";
    if ($conn->query($sql) === TRUE) {
        header("Location: Dashboard.php");
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update User</title>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Update User</h2>
    <form class="mx-auto mt-4" style="max-width: 500px;" method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="Student" <?php echo $user['role'] == 'Student' ? 'selected' : ''; ?>>Student</option>
                <option value="Lecturer" <?php echo $user['role'] == 'Lecturer' ? 'selected' : ''; ?>>Lecturer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100" name="update">Update</button>
    </form>
</div>
</body>
</html>
