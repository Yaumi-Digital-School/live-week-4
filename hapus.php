<?php
$db = new SQLite3('db/todo.db');

$taskId = $_GET['task_id'];

$query = "DELETE FROM tasks WHERE id='$taskId'";
$ekesekusi = $db.exec($query);
if ($eksekusi == TRUE) {
    header('Location: index.php');
}
?>