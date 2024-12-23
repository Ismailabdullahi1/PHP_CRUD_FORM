<?php 
include 'db.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: User_Login.php");
    exit;
}


if (isset($_GET['matric']) && !empty($_GET['matric'])) {
    $matric = $conn->real_escape_string($_GET['matric']); 

    // Check if the user exists
    $check_sql = "SELECT * FROM users WHERE matric='$matric'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Delete the user
        $delete_sql = "DELETE FROM users WHERE matric='$matric'";
        if ($conn->query($delete_sql) === TRUE) {
            header("Location: Dashboard.php?message=deleted");
        } else {
            header("Location: Dashboard.php?error=delete_failed");
        }
    } else {
        header("Location: Dashboard.php?error=user_not_found");
    }
} else {
    header("Location: Dashboard.php?error=invalid_request");
}
?>
