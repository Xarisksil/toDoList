<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM tasks");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>To Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add.php" method="post">
        <input type="text" name="task" placeholder="New task" required>
        <button type="submit">Add</button>
    </form>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <span><?php echo htmlspecialchars($task['task']); ?></span>
                <form action="delete.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
                <form action="update.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <button type="submit"><?php echo $task['status'] ? 'Unmark' : 'Complete'; ?></button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
