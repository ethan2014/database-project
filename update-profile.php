<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>
      Rocket Stats-Stats
    </title><!-- Bootstrap -->
    <link href="css/site.css"  rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?php

    $id = $_GET['id'];
    $msg = $_GET['msg'];
    
    $db = new SQLite3('rocketleague.db');
    $query = 'SELECT * FROM profile WHERE p_id = ' . $id;

    $res = $db->query($query);

    while ($row = $res->fetchArray()) {
	$name = $row['username'];
	$clan = $row['clan'];
	$email = $row['email'];
    }

    $name = trim($name);
    $clan = trim($clan);
    $email = trim($email);

    ?>

    <!-- /.container -->
    <div class="container">
	<form type="GET" action="update-existing-profile.php" id="form-con">
	    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
	    <fieldset clsas="form-group">
		<label for="name">Name</label>
		<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>">
	    </fieldset>
	    <fieldset clsas="form-group">
		<label for="clan">Clan</label>
		<input type="text" id="clan" name="clan" class="form-control" value="<?php echo $clan; ?>">
	    </fieldset>
	    <fieldset clsas="form-group">
		<label for="email">Email</label>
		<input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>">
	    </fieldset>
	    <br />
	    <?php
	    if (strlen($msg) !== 0) {
		echo '
	    <div class="alert alert-warning">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo $msg;
		echo '</div>';
	    }
	    ?>
	    <input type="submit" class="btn btn-success" value="submit">
	</form>
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
