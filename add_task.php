<?php
 $db = new SQLite3('db/todo.db');



// Cek apakah ada task baru yang diinput oleh user
if (isset($_POST['input_task'])) {

    $newTask = $_POST['input_task'];


    // echo "INSERT INTO tasks name VALUE '$newTask'";

    $statement = $db->prepare("INSERT INTO tasks (name) VALUES ('$newTask')");
    $results = $statement->execute();

    // @TODO: Insert task di database
    // echo "Ops.. fungsi tidak ditemukan. Buat fungsi untuk insert task di database";

    //  Function untuk redirect ke halaman index.php
    //  header('Location: index.php');
} else {
    /***
     * Langsung dilakukan redirect ke halaman index.php
     * Jika user melakukan input kosong
    ***/
    header('Location: index.php');
}

?>