<?php
$id = $_GET['id'];

$db = new SQLite3('database.db');

$db->query('DELETE FROM profile WHERE p_id = ' . $id);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
