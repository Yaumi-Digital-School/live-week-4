<?php

include('db/migration.php');

// Cek apakah ada task baru yang diinput oleh user
if (isset($_POST['input_task'])) {
    $newTask = $_POST['input_task'];

    // @TODO: Insert task di database
    $query = "INSERT INTO tasks(name, is_done) VALUES ('$newTask', 0)";
    $db->exec($query);
    // echo "Ops.. fungsi tidak ditemukan. Buat fungsi untuk insert task di database";

    //  Function untuk redirect ke halaman index.php
     header('Location: index.php');
} else {
    /***
     * Langsung dilakukan redirect ke halaman index.php
     * Jika user melakukan input kosong
    ***/
    header('Location: index.php');
}