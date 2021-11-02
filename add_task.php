<?php

$db = new SQLite3('db/todo.db');

// Cek apakah ada task baru yang diinput oleh user
if (isset($_POST["submit"])) {
    if( $_POST["input_task"] !== '' ) {

        // get max id from current tasks. New task id will be incremented from max id
        $get_max_id = $db->prepare("SELECT * FROM tasks ORDER BY id DESC LIMIT 1");
        $results = $get_max_id->execute();
        $row = $results -> fetchArray();
        $id = ++$row["id"];
        
        // add task
        $new_task = $_POST["input_task"];
        $query = "INSERT INTO tasks VALUES ($id, '$new_task', 0)";

        $input = $db->exec($query);
        if ($input == TRUE) {
            header('Location: index.php');
        }else{
            echo "
            <script>
                alert('Error!');
                document.location.href='index.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Task tidak boleh kosong!');
            document.location.href='index.php';
        </script>
        ";
    }
} else {
    /***
     * Langsung dilakukan redirect ke halaman index.php
     * Jika user melakukan input kosong
    ***/
    header('Location: index.php');
}