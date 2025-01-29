<?php
require 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare('INSERT INTO tasks (title, description, status) VALUES (?, ?, ?)');
    $stmt->execute([$title, $description, $status]);

    header('Location: index.php');
}

require 'includes/header.php';
?>

<div class="container">
    <h2>Crear Nueva Tarea</h2>
    <form action="create_task.php" method="post">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control">
                <option value="pending">Pendiente</option>
                <option value="completed">Completada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Tarea</button>
    </form>
</div>

<?php require 'includes/footer.php'; ?>
