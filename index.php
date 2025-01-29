<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config/config.php';
require 'includes/header.php';

// Obtener todas las tareas de la base de datos
$stmt = $pdo->query('SELECT * FROM tasks');
$tasks = $stmt->fetchAll();
?>

<div class="container">
    <h1>Lista de Tareas</h1>
    <a href="create_task.php" class="btn btn-primary">Crear Nueva Tarea</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo $task['id']; ?></td>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo $task['description']; ?></td>
                    <td><?php echo $task['status']; ?></td>
                    <td>
                        <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete_task.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require 'includes/footer.php'; ?>
