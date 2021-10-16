<?php

$taskId = $_GET['task_id'];
$db = new SQLite3('db/todo.db');

// Get task data dari Database
$statement = $db->prepare("SELECT * from tasks where id = :task_id");
$statement->bindValue("task_id", $taskId);
$results = $statement->execute();

// Check, apakah ada result?
if (!$results) {
    echo "Task tidak ditemukan";
    header('refresh:1; url=index.php');
}

// Update task is_done = 1 atau is_done = 0
while ($row = $results->fetchArray()) {
    if ($row["is_done"] == 0) {
        $statement = $db->prepare("UPDATE tasks SET is_done = '1' WHERE id = :task_id");
    } else if ($row["is_done"] == 1) {
        $statement = $db->prepare("UPDATE tasks SET is_done = '0' WHERE id = :task_id");
    }
    $statement->bindValue("task_id", $taskId);
    $results = $statement->execute();

    //@TODO: Update is_done pada sebuah task di database
}
header('refresh:1; url=index.php');
