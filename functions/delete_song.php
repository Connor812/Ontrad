<?php

require_once("../config/db.php");
require_once("../config-url.php");

$id = $_GET['id'];

if (!isset($_GET['id'])) {
    echo '<script>window.location.href = "' . BASE_URL . '/editsong.php?error=empty_id";</script>';
    exit;
}

$sql = 'DELETE FROM `newtable` WHERE `ID` = ?';

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param('i', $id);
    $success= $stmt->execute();
    
    if ($success) {
        echo "Song has been deleted";
        echo '<script>window.location.href = "' . BASE_URL . '/editsong.php?success=song_deleted";</script>';
        exit;
    } else {
        echo "Song can't be deleted";
        echo '<script>window.location.href = "' . BASE_URL . '/editsong.php?error=song_not_deleted";</script>';
        exit;
    }
    
     
} else {
    // Handle statement preparation error
    echo 'Error preparing statement.';
}
