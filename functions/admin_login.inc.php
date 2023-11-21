<?php
session_start();
require_once '../config/db.php';


$username = $_POST['username'];
$pwd = $_POST['pwd'];
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

echo $username;
echo $pwd;

if (empty($username)) {
    echo "works";
    header("Location: ../admin_login.php?error=empty_username");
    exit;
} elseif (empty($pwd)) {
    echo "works";
    header("Location: ../admin_login.php?error=empty_pwd");
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
            header("Location: ../songmanager.php?success=successfully_logged_in");
            exit;
        } else {
            // Password doesn't match
            header("Location: ../admin_login.php?error=pwd_doesnt_match");
            exit;
        }
    } else {
        // Username doesn't exist
        header("Location: ../admin_login.php?error=username_doesnt_exist");
        exit;
    }
} else {
    // Handle statement preparation error
    echo 'Error preparing statement.';
}