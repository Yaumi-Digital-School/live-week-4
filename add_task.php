<?php

// Cek apakah ada task baru yang diinput oleh user
if (isset($_POST['input_task'])) {
    $newTask = $_POST['input_task'];
    echo $newTask;
    // @TODO: Insert task di database
    insertTask($newTask);

    //  Function untuk redirect ke halaman index.php
    header('Location: index.php');
} else {
    /***
     * Langsung dilakukan redirect ke halaman index.php
     * Jika user melakukan input kosong
    ***/
    header('Location: index.php');
}

function insertTask ($task) {
    $db = new SQLite3('db/todo.db');
    $statement = $db->prepare("INSERT INTO tasks(name, is_done) VALUES ('$task', 0)");
    $results = $statement->execute();
}