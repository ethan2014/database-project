<?php

$matchId = rand();
$duration = $_GET['duration'];
$blueGoals = $_GET['blue-goals'];
$orangeGoals = $_GET['orange-goals'];
$winner = $_GET['winning-team'];
$matchFormat = $_GET['match-format'];

$id01 = $_GET['id0-1'];
$id02 = $_GET['id0-2'];
$id03 = $_GET['id0-3'];
$id11 = $_GET['id1-1'];
$id12 = $_GET['id1-2'];
$id13 = $_GET['id1-3'];

$goals01 = $_GET['goals0-1'];
$goals02 = $_GET['goals0-2'];
$goals03 = $_GET['goals0-3'];
$goals11 = $_GET['goals1-1'];
$goals12 = $_GET['goals1-2'];
$goals13 = $_GET['goals1-3'];

$distance01 = $_GET['distance0-1'];
$distance02 = $_GET['distance0-2'];
$distance03 = $_GET['distance0-3'];
$distance11 = $_GET['distance1-1'];
$distance12 = $_GET['distance1-2'];
$distance13 = $_GET['distance1-3'];

$saves01 = $_GET['saves0-1'];
$saves02 = $_GET['saves0-2'];
$saves03 = $_GET['saves0-3'];
$saves11 = $_GET['saves1-1'];
$saves12 = $_GET['saves1-2'];
$saves13 = $_GET['saves1-3'];

$db = new SQLite3('rocketleague.db');

$matchQuery = "INSERT INTO match " .
            "(m_id, duration, b_goals, r_goals, winning_team)" .
            "VALUES($matchId, $duration, $blueGoals, $orangeGoals, $winner)";

$playerQuery = "INSERT INTO participates_in " .
             "(p_id, m_id, team, goals, saves, distance_driven, duration, demos)" .
             "($id01, $matchId, 0, $goals01, $saves01, $distance01, 0, 0)";
$db->exec($matchQuery);

$playerQuery = "INSERT INTO participates_in " .
             "(p_id, m_id, team, goals, saves, distance_driven, duration, demos)" .
             "($id02, $matchId, 0, $goals02, $saves02, $distance02, 0, 0)";
$db->exec($matchQuery);

$playerQuery = "INSERT INTO participates_in " .
             "(p_id, m_id, team, goals, saves, distance_driven, duration, demos)" .
             "($id03, $matchId, 0, $goals03, $saves03, $distance03, 0, 0)";
$db->exec($matchQuery);

$playerQuery = "INSERT INTO participates_in " .
             "(p_id, m_id, team, goals, saves, distance_driven, duration, demos)" .
             "($id11, $matchId, 1, $goals11, $saves11, $distance11, 0, 0)";
$db->exec($matchQuery);

$playerQuery = "INSERT INTO participates_in " .
             "(p_id, m_id, team, goals, saves, distance_driven, duration, demos)" .
             "($id12, $matchId, 1, $goals12, $saves12, $distance12, 0, 0)";
$db->exec($matchQuery);

$playerQuery = "INSERT INTO participates_in " .
             "(p_id, m_id, team, goals, saves, distance_driven, duration, demos)" .
             "($id13, $matchId, 1, $goals13, $saves13, $distance13, 0, 0)";
$db->exec($matchQuery);

header("Location: index.html");
exit();
            
?>