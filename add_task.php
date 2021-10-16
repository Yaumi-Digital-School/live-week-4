<?php

// Cek apakah ada task baru yang diinput oleh user
if (isset($_POST['input_task'])) {
    $newTask = $_POST['input_task'];
    if(strcmp($newTask, "")!=0){
        $db = new SQLite3('db/todo.db');
        // @TODO: Insert task di database
        $statement = $db->prepare("INSERT INTO tasks (name, is_done) values (:task, 0)");
        $statement->bindValue("task", $newTask);
        $results = $statement->execute();
    }
    
    //echo "Ops.. fungsi tidak ditemukan. Buat fungsi untuk insert task di database";

    //  Function untuk redirect ke halaman index.php
     header('Location: index.php');
}

//gajalan ini 
// else {
//     /***
//      * Langsung dilakukan redirect ke halaman index.php
//      * Jika user melakukan input kosong
//     ***/
//     header('Location: index.php');
// }