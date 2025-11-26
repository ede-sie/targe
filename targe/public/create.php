<?php 
require_once "../src/UserController.php"; 
require_once "../src/TaskController.php"; 
 
$users = getActiveUsers(); 
 
if ($_POST) { 
    if (empty($_POST['title'])) { 
        $error = "El título es obligatorio"; 
    } else { 
        createTask($_POST); 
        header("Location: index.php"); 
        exit; 
    } 
} 
?> 
<!DOCTYPE html> 
<html> 
<head><link rel="stylesheet" href="assets/style.css"></head> 
<body> 
<h2>Crear tarea</h2> 
 
<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?> 
 
<form method="POST"> 
    <label>Título:</label> 
    <input name="title" required><br> 
 
    <label>Descripción:</label> 
    <textarea name="description"></textarea><br> 
 
    <label>Responsable:</label> 
    <select name="user_id"> 
        <?php while($u = $users->fetch_assoc()): ?> 
            <option value="<?= $u['id'] ?>"><?= $u['name'] ?></option> 
        <?php endwhile; ?> 
    </select><br> 
 
    <label>Prioridad:</label> 
    <select name="priority"> 
        <option value="baja">Baja</option> 
        <option value="media">Media</option> 
        <option value="alta">Alta</option> 
    </select><br> 
 
    <label>Fecha límite:</label> 
    <input type="date" name="deadline"><br><br> 
 
    <button type="submit">Guardar</button> 
</form> 
</body> 
</html> 
 