<?php
$db = new SQLite3('db/todo.db');
// Cek apakah ada task baru yang diinput oleh user
if (isset($_POST['input_task'])) {
    $newTask = $_POST['input_task'];
    var_dump(($newTask));

    // @TODO: Insert task di database
    $db->exec("INSERT INTO tasks(name, is_done) VALUES ('$newTask', 0)");

    //  Function untuk redirect ke halaman index.php
    header('Location: index.php');
} else {
    /***
     * Langsung dilakukan redirect ke halaman index.php
     * Jika user melakukan input kosong
     ***/
    header('Location: index.php');
}
