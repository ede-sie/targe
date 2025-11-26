<?php 
require_once "db.php"; 
 
function getActiveUsers() { 
    global $conn; 
    $sql = "SELECT * FROM users WHERE active = 1"; 
    return $conn->query($sql); 
} 
 
function getUser($id) { 
    global $conn; 
    return $conn->query("SELECT * FROM users WHERE id = $id")->fetch_assoc(); 
} 
?> 
