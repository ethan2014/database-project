<?php

$name = $_GET['name'];
$clan = $_GET['clan'];
$email = $_GET['email'];

$name = trim($name);
$clan = trim($clan);
$email = trim($email);

if (strlen($name) === 0 || strlen($clan) === 0 || strlen($email) === 0) {
    header("Location: add-profile.php?name=" . $name
           . "&clan=" . $clan
           . "&email=" . $email
           . "&msg=name, clan and email must be entered");
    exit();
}

$db = new SQLite3('rocketleague.db');

$query = "INSERT INTO profile VALUES(" . rand() . ",'" . $name . "','" . $email . "','" . $clan . "');";
$db->exec($query);

header("Location: stats.php");
exit();

?>
