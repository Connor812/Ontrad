<?php

require_once("../config/db.php");
require_once("../config-url.php");

$id = $_GET['id'];

if (!isset($_GET['id'])) {
    echo '<script>window.location.href = "' . BASE_URL . '/editThemeHome.php?error=empty_id";</script>';
    exit;
}

$sql = 'DELETE FROM `themes` WHERE `id` = ?';

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param('i', $id);
    $success= $stmt->execute();
    
    if ($success) {
        echo "theme has been deleted";
        echo '<script>window.location.href = "' . BASE_URL . '/editThemeHome.php?success=theme_deleted";</script>';
        exit;
    } else {
        echo "theme can't be deleted";
        echo '<script>window.location.href = "' . BASE_URL . '/editThemeHome.php?error=theme_not_deleted";</script>';
        exit;
    }
    
     
} else {
    // Handle statement preparation error
    echo 'Error preparing statement.';
}