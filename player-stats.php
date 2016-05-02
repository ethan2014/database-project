<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport"><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
      Rocket Stats-Stats
    </title><!-- Bootstrap -->
    <link href="css/site.css"  rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button aria-expanded="false" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">
		<img alt="Brand" src="http://dontforgetatowel.com/wp-content/uploads/2015/09/Rocket-League-Logo.jpg" style="width: 200px; margin-top: -35px;"></a>
        </div><!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="active">
              <a href="stats.php">Stats</a>
            </li>
	    <li>
		<a href="add-match.php">Add Match</a>
	    </li>
          </ul>
          </div>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- /.container -->
    <div class="container">
	<?php

	$id = $_GET['id'];
	
	$db = new SQLite3('database.db');
	$query = 'SELECT * FROM profile ' .
		 'NATURAL LEFT JOIN player_statistics ' .
		 'NATURAL LEFT JOIN player_car ' .
		 'WHERE p_id = ' . $id;

	$res = $db->query($query);

	function getValue($row, $val) {
	    $ret = $row[$val];

	    if (!$ret || strcmp($ret.trim(), '') === 0 || $ret === null) {
		$ret = '<b>nothing yet</b>';
	    }

	    return $ret;
	}
	
	while ($row = $res->fetchArray()) {
	    echo '<div id="player-list-con" class="jumbotron">';
	    echo '<div class="player-stats-con row">';
	    echo '<h3>Stats for ' . getValue($row, 'name') . '</h3>';
	    echo '<p><b>Player Info</b></p>';
	    echo '<p>Clan: ' . getValue($row, 'clan') . '</p>';
	    echo '<p>Email: ' . getValue($row, 'email') . '</p>';
	    echo '<br />';
	    echo '<p><b>Player Stats</b></p>';
	    echo '<p>Goals: ' . getValue($row, 'goals') . '</p>';
	    echo '<p>Saves: ' . getValue($row, 'saves') . '</p>';
	    echo '<p>Matches Played: ' . getValue($row, 'matches_played') . '</p>';
	    echo '<br />';
	    echo '<p><b>Current Car</b></p>';
	    echo '<p>Name: ' . getValue($row, 'car_name') . '</p>';
	    echo '<p>Atenna: ' . getValue($row, 'antenna') . '</p>';
	    echo '<p>Topper: ' . getValue($row, 'topper') . '</p>';
	    echo '<p>Wheels: ' . getValue($row, 'wheels') . '</p>';
	    echo '</div>';
	    echo '</div>';
	}
	?>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script> <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="js/bootstrap.min.js">
    </script>
    <br><br>
    <p style=" bottom: 0; width:100%; text-align: center; font-size: 12px"><i>Website Powered by TeAM TeAM </i>
    </p>
  </body>
</html>
