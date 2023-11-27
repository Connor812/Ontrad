<?php
session_start();
require_once '../config/db.php';
require_once '../config-url.php';

$username = $_POST['username'];
$pwd = $_POST['pwd'];
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

echo $username . "<br>";
echo $pwd . "<br>";
echo $hashedPwd . "<br>";
echo "update";

// Check if $username or $pwd is empty
if (empty($username) || empty($pwd)) {
    // Redirect with an error message
    echo "empty input";
    echo '<script>window.location.href = "' . BASE_URL . '/admin_login.php?error=empty_username_or_pwd";</script>';
    exit;
}


$sql = 'SELECT `username`,  `pwd` FROM `admin` WHERE `username` = ?;';

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the username exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $matchPwd = $row['pwd'];

        if (password_verify($pwd, $matchPwd)) {
            // Password matches, set session variable and redirect
            $_SESSION['username'] = $username;
            echo '<script>window.location.href = "' . BASE_URL . '/songmanager.php?success=successfully_logged_in";</script>';
            exit;
        } else {
            // Password doesn't match
            echo '<script>window.location.href = "' . BASE_URL . '//admin_login.php?error=pwd_doesnt_match";</script>';
            exit;
        }
    } else {
        // Username doesn't exist
        echo '<script>window.location.href = "' . BASE_URL . '//admin_login.php?error=username_doesnt_exist";</script>';
        exit;
    }
} else {
    // Handle statement preparation error
    echo 'Error preparing statement.';
}