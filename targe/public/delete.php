<?php 
require_once "../src/TaskController.php"; 
 
$id = $_GET['id']; 
deleteTask($id); 
 
header("Location: index.php"); 
exit; 
?> 
 