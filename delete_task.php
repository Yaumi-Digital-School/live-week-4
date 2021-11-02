<?php

$taskId = $_GET['id'];
$db = new SQLite3('db/todo.db');

// Get task data dari Database
$statement = $db->prepare("DELETE FROM tasks where id = '$taskId'");
$results = $statement->execute();

if ($results == TRUE) {
    header('Location: index.php');
}else{
    echo "Error";
}
?>