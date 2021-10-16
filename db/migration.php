<?php
$db = new SQLite3('db/todo.db');

$db->exec("CREATE TABLE IF NOT EXISTS tasks(id INTEGER PRIMARY KEY, name TEXT, is_done INT(1))");
$db->exec("INSERT INTO tasks(name, is_done) VALUES ('Ngerjain tugas YDS', 0)");
$db->exec("INSERT INTO tasks(name, is_done) VALUES ('Beli buah mangga', 1)");
