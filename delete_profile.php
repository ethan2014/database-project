<?php
$id = $_GET['id'];

echo $id;

$db = new SQLite3('database.db');

$db->exec('DELETE FROM profile WHERE p_id = ' . $id);

//header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
