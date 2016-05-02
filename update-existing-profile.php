<?php

$id = $_GET['id'];
$name = $_GET['name'];
$clan = $_GET['clan'];
$email = $_GET['email'];

$name = trim($name);
$clan = trim($clan);
$email = trim($email);

if (strlen($name) === 0 || strlen($clan) === 0 || strlen($email) === 0) {
    header("Location: update-profile.php?id=" . $id
           . "&msg=name, clan and email must be entered");
    exit();
}

$db = new SQLite3('rocketleague.db');

$query = "UPDATE profile SET " .
       "username = '" . $name . "'," .
       "clan = '" . $clan . "'," .
       "email = '" . $email . "' " .
       "WHERE P_id = " . $id;
$db->exec($query);

header("Location: stats.php");
exit();

?>
