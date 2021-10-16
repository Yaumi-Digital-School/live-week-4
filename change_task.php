<?php

$taskId = $_GET['task_id'];
$db = new SQLite3('db/todo.db');


// Get task data dari Database
$statement = $db->prepare("SELECT * from tasks where id=:task_id");
$statement->bindValue("task_id", $taskId);
$results = $statement->execute();
$results = $results->fetchArray();

$update= $db->prepare("UPDATE tasks SET is_done = :done WHERE id = :task_id");
$update->bindValue("task_id", $taskId);
if($results["is_done"] == 1){
    $update->bindValue("done", 0);
}else{
    $update->bindValue("done", 1);
}
$update = $update->execute();

// var_dump($results->fetchArray());
header('Location: index.php');



// Check, apakah ada result?
// if ($results->fetchArray()) {
//     echo "Task tidak ditemukan";
//     header('refresh:1; url=index.php');
// }

// Update task is_done = 1 atau is_done = 0
// while ($row = $results->fetchArray()) {
//     var_dump($results->fetchArray());
//     //@TODO: Update is_done pada sebuah task di database
//     // $db = new SQLite3('db/todo.db');
//     // $update= $db->prepare("UPDATE tasks SET is_done = 1 WHERE id = :task_id");
//     // $update->bindValue("id", $taskId);
//     // $update = $statement->execute();

//     // header('Location: index.php');
// }