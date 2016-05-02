<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport"><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>
	    Rocket Stats - Match
	</title><!-- Bootstrap -->
	<link href="css/site.css"  rel="stylesheet" >
	<link href="css/bootstrap.min.css" rel="stylesheet"><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="js/jquery.js"></script>
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
			<li>
			    <a href="stats.php">Stats</a>
			</li>
			<li class="active">
			    <a href="add-match.php">Add Match</a>
			</li>
		    </ul>
		</div>
            </div><!-- /.navbar-collapse -->
	    </div><!-- /.container-fluid -->
	</nav>

	<script type="text/javascript">
	 $(document).ready(function() {
	     function toggle_players() {
		 var type = $("#match-format").val();

		 if (type === "0") {
		     $("#team0-2").hide();
		     $("#team0-3").hide();
		     $("#team1-2").hide();
		     $("#team1-3").hide();
		 } else if (type === "1") {
		     $("#team0-2").show();
		     $("#team0-3").hide();
		     $("#team1-2").show();
		     $("#team1-3").hide();
		 } else if (type === "2") {
		     $("#team0-2").show();
		     $("#team0-3").show();
		     $("#team1-2").show();
		     $("#team1-3").show();
		 }
	     }

	     $("#match-format").on("change", function() {
		 toggle_players();
	     });

	     toggle_players();
	 });
	</script>

	<?php
	$db = new SQLite3('rocketleague.db');
	$query = 'SELECT * FROM profile';

	$res = $db->query($query);

	$players = array();

	while ($row = $res->fetchArray()) {
	    $id = $row['P_id'];
	    $name = $row['username'];

	    $players[$id] = $name;
	}
	?>

	<div class="container">
	    <form type="GET" action="create-new-match.php" id="form-con">
		<div id="match-info-con">
		    <h4>Match Info</h4>
		    <fieldset clsas="form-group">
			<label for="duraction">Duration</label>
			<input type="number" min="1" value="1"
			       id="duration" name="duration" class="form-control">
		    </fieldset>
		    <fieldset clsas="form-group">
			<label for="blue-goals">Blue Team Goals</label>
			<input type="number" min="0" value="0"
			       id="blue-goals" name="blue-goals" class="form-control">
		    </fieldset>
		    <fieldset clsas="form-group">
			<label for="orange-goals">Orange Team Goals</label>
			<input type="number" min="0" value="0"
			       id="orange-goals" name="orange-goals" class="form-control">
		    </fieldset>
		    <fieldset clsas="form-group">
			<label for="winning-team">Winning Team</label>
			<select id="winning-team" name="winning-team" class="form-control">
			    <option value="0">Orange Team</option>
			    <option value="1">Blue Team</option>
			</select>
		    </fieldset>
		    <fieldset clsas="form-group">
			<label for="match-format">Format</label>
			<select id="match-format" name="match-format" class="form-control">
			    <option value="0">1v1</option>
			    <option value="1">2v2</option>
			    <option value="2">3v3</option>
			</select>
		    </fieldset>
		</div>
		<br />
		<div id="team0-con" class="team-con">
		    <h4>Orange Team</h4>
		    <div id="team0-1" class="player-con">
			<h5>Player 1</h5>
			<fieldset clsas="form-group">
			    <label for="id0-1">Player Name</label>
			    <select id="id0-1" name="id0-1" class="form-control">
				<?php
				foreach ($players as $key => $value) {
				    echo "<option value='$key'>$value</option>";
				}
				?>
			    </select>
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="goals0-1">Goals</label>
			    <input type="number" min="0" value="0" id="goals0-1"
				   name="goals0-1" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="distance0-1">Distance</label>
			    <input type="number" min="0" value="0"
				   id="distance0-1" name="distance0-1" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="saves0-1">Saves</label>
			    <input type="number" min="0" value="0"
				   id="saves0-1" name="saves0-1" class="form-control">
			</fieldset>
		    </div>
		    <br />
		    <div id="team0-2" class="player-con">
			<h5>Player 2</h5>
			<fieldset clsas="form-group">
			    <label for="id0-2">Player Name</label>
			    <select id="id0-2" name="id0-2" class="form-control">
				<?php
				foreach ($players as $key => $value) {
				    echo "<option value='$key'>$value</option>";
				}
				?>
			    </select>
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="goals0-2">Goals</label>
			    <input type="number" min="0" value="0"
				   id="goals0-2" name="goals0-2" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="distance0-2">Distance</label>
			    <input type="number" min="0" value="0"
				   id="distance0-2" name="distance0-2" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="saves0-2">Saves</label>
			    <input type="number" min="0" value="0"
				   id="saves0-2" name="saves0-2" class="form-control">
			</fieldset>
		    </div>
		    <br />
		    <div id="team0-3" class="player-con">
			<h5>Player 3</h5>
			<fieldset clsas="form-group">
			    <label for="id0-3">Player Name</label>
			    <select id="id0-3" name="id0-3" class="form-control">
				<?php
				foreach ($players as $key => $value) {
				    echo "<option value='$key'>$value</option>";
				}
				?>
			    </select>
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="goals0-3">Goals</label>
			    <input type="number" min="0" value="0"
				   id="goals0-3" name="goals0-3" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="distance0-3">Distance</label>
			    <input type="number" min="0" value="0"
				   id="distance0-3" name="distance0-3" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="saves0-3">Saves</label>
			    <input type="number" min="0" value="0"
				   id="saves0-3" name="saves0-3" class="form-control">
			</fieldset>
		    </div>
		</div>
		<br />
		<div id="team1-con" class="team-con">
		    <h4>Blue Team</h4>
		    <div id="team1-1" class="player-con">
			<h5>Player 1</h5>
			<fieldset clsas="form-group">
			    <label for="id1-1">Player Name</label>
			    <select id="id1-1" name="id1-1" class="form-control">
				<?php
				foreach ($players as $key => $value) {
				    echo "<option value='$key'>$value</option>";
				}
				?>
			    </select>
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="goals1-1">Goals</label>
			    <input type="number" min="0" value="0"
				   id="goals1-1" name="goals1-1" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="distance1-1">Distance</label>
			    <input type="number" min="0" value="0"
				   id="distance1-1" name="distance1-1" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="saves1-1">Saves</label>
			    <input type="number" min="0" value="0"
				   id="saves1-1" name="saves1-1" class="form-control">
			</fieldset>
		    </div>
		    <br />
		    <div id="team1-2" class="player-con">
			<h5>Player 2</h5>
			<fieldset clsas="form-group">
			    <label for="id1-2">Player Name</label>
			    <select id="id1-2" name="id1-2" class="form-control">
				<?php
				foreach ($players as $key => $value) {
				    echo "<option value='$key'>$value</option>";
				}
				?>
			    </select>
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="goals1-2">Goals</label>
			    <input type="number" min="0" value="0"
				   id="goals1-2" name="goals1-2" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="distance1-2">Distance</label>
			    <input type="number" min="0" value="0"
				   id="distance1-2" name="distance1-2" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="saves1-2">Saves</label>
			    <input type="number" min="0" value="0"
				   id="saves1-2" name="saves1-2" class="form-control">
			</fieldset>
		    </div>
		    <br />
		    <div id="team1-3" class="player-con">
			<h5>Player 3</h5>
			<fieldset clsas="form-group">
			    <label for="id1-3">Player Name</label>
			    <select id="id1-3" name="id1-3" class="form-control">
				<?php
				foreach ($players as $key => $value) {
				    echo "<option value='$key'>$value</option>";
				}
				?>
			    </select>
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="goals1-3">Goals</label>
			    <input type="number" min="0" value="0"
				   id="goals1-3" name="goals1-3" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="distance1-3">Distance</label>
			    <input type="number" min="0" value="0"
				   id="distance1-3" name="distance1-3" class="form-control">
			</fieldset>
			<fieldset clsas="form-group">
			    <label for="saves1-3">Saves</label>
			    <input type="number" min="0" value="0"
				   id="saves1-3" name="saves1-3" class="form-control">
			</fieldset>
		    </div>
		</div>
		<br />
		<input type="submit" class="btn btn-success" value="submit">
	    </form>
	    <!--
		 <?php 
		 $db = new SQLite3('database.db');
		 $query = 'SELECT * FROM profile ' .
		 'NATURAL LEFT JOIN player_statistics ' .
		 'NATURAL LEFT JOIN player_car;';

		 $res = $db->query($query);

		 function getValue($row, $val) {
		 $ret = $row[$val];

		 if (!$ret || strcmp($ret.trim(), '') === 0 || $ret === null) {
		 $ret = '<b>nothing yet</b>';
		 }

		 return $ret;
	    }
	    
		 while ($row = $res->fetchArray()) {
	    $id = $row['P_id'];

	    echo '<div id="player-list-con" class="jumbotron">';
		echo '<div id="player-name" class="row">';
		echo '<p class="col-md-4"><b>' . getValue($row, 'name') . '</b></p>';
		echo '<a href="/update-profile.php?id=' . $id . '" class="btn btn-info player-update-btn col-md-offset-6 col-md-1">Update</a>';
		echo '<a href="/delete-profile.php?id=' . $id . '" class="btn btn-danger player-del-btn col-md-1">Delete</a>';
		echo '</div>';
		echo '<p><b>Player Info</b></p>';
		echo '<p>Clan: ' . getValue($row, 'clan') . '</p>';
		echo '<p>Email: ' . getValue($row, 'email') . '</p>';
		echo '<p><b>Player Stats</b></p>';
		echo '<p>Goals: ' . getValue($row, 'goals') . '</p>';
		echo '<p>Saves: ' . getValue($row, 'saves') . '</p>';
		echo '<p>Matches Played: ' . getValue($row, 'matches_played') . '</p>';
		echo '<p><b>Current Car</b></p>';
		echo '<p>Name: ' . getValue($row, 'car_name') . '</p>';
		echo '<p>Atenna: ' . getValue($row, 'antenna') . '</p>';
		echo '<p>Topper: ' . getValue($row, 'topper') . '</p>';
		echo '<p>Wheels: ' . getValue($row, 'wheels') . '</p>';
		echo '</div>';
	    }
	    ?>
	    -->
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
