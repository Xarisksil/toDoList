<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("UPDATE tasks SET status = !status WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

header('Location: index.php');
exit();
?>
