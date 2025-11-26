<?php 
require_once "db.php";  // incluir el archivo de conexion
 
function getTasks() { 
    global $conn; 
    $sql = "SELECT tasks.*, users.name AS user_name, 
            TIMESTAMPDIFF(HOUR, tasks.created_at, NOW()) AS hours_passed 
            FROM tasks 
            LEFT JOIN users ON tasks.user_id = users.id"; 
    return $conn->query($sql); 
} 
 
function getTask($id) { 
    global $conn; 
    $sql = "SELECT * FROM tasks WHERE id = $id"; 
    return $conn->query($sql)->fetch_assoc(); 
} 
 
function createTask($data) { 
    global $conn; 
 
    $title = $conn->real_escape_string($data['title']); 
    $desc  = $conn->real_escape_string($data['description']); 
    $user  = intval($data['user_id']); 
    $prio  = $conn->real_escape_string($data['priority']); 
    $dead  = $conn->real_escape_string($data['deadline']); 
 
    $sql = "INSERT INTO tasks(title, description, user_id, priority, deadline, assigned_at) 
            VALUES ('$title', '$desc', $user, '$prio', '$dead', NOW())"; 
    return $conn->query($sql); 
} 
 
function updateTask($id, $data) { 
    global $conn; 
 
    $task = getTask($id); 
    $newUser = intval($data['user_id']); 
    $changeAssigned = ($task['user_id'] != $newUser) ? ", assigned_at = NOW()" : ""; 
 
    $sql = "UPDATE tasks SET 
        title='{$data['title']}', 
        description='{$data['description']}', 
        user_id={$newUser}, 
        priority='{$data['priority']}', 
        deadline='{$data['deadline']}' 
        $changeAssigned 
        WHERE id=$id"; 
 
    return $conn->query($sql); 
} 
 
function deleteTask($id) { 
    global $conn; 
    return $conn->query("DELETE FROM tasks WHERE id = $id"); 
} 
?> 
