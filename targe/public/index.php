<?php
echo "Hola mundo";

require_once "../src/TaskController.php"; 
$tasks = getTasks(); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <link rel="stylesheet" href="assets/style.css"> 
</head> 
<body> 


<h1>Gestión de tareas</h1> 
 
<a href="create.php" class="button">Crear nueva tarea</a> 
<br><br> 
 
<table border="1" cellpadding="8"> 
    <tr> 
        <th>Título</th> 
        <th>Responsable</th> 
        <th>Estado</th> 
        <th>Prioridad</th> 
        <th>Fecha límite</th> 
        <th>Horas transcurridas</th> 
        <th>Acciones</th> 
    </tr> 
 
    <?php while($t = $tasks->fetch_assoc()): ?> 
    <tr> 
        <td><?= $t['title'] ?></td> 
        <td><?= $t['user_name'] ?></td> 
        <td><?= $t['status'] ?></td> 
        <td><?= $t['priority'] ?></td> 
        <td><?= $t['deadline'] ?></td> 
        <td><?= $t['hours_passed'] ?> h</td> 
        <td> 
            <a href="edit.php?id=<?= $t['id'] ?>">Editar</a> | 
            <a href="delete.php?id=<?= $t['id'] ?>" onclick="return confirm('¿Eliminar tarea?')">Eliminar</a> 
        </td> 
    </tr> 
    <?php endwhile; ?> 
</table> 
</body> 
</html> 
