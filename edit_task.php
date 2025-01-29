<?php
require 'config/config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare('UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?');
    $stmt->execute([$title, $description, $status, $id]);

    header('Location: index.php');
}

$stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = ?');
$stmt->execute([$id]);
$task = $stmt->fetch();

require 'includes/header.php';
?>

<div class="container">
    <h2>Editar Tarea</h2>
    <form action="edit_task.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $task['title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control"><?php echo $task['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" <?php if ($task['status'] === 'pending') echo 'selected'; ?>>Pendiente</option>
                <option value="completed" <?php if ($task['status'] === 'completed') echo 'selected'; ?>>Completada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
    </form>
</div>

<?php require 'includes/footer.php'; ?>
