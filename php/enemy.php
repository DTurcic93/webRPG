<!DOCTYPE html>
<html>
<head>
	<title>šibanje</title>	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
	    	<div class="navbar-header">
	      		<a class="navbar-brand" href="/home.php">ŠIBANJE</a>
	    	</div>
	    	<ul class="nav navbar-nav">	      		
	      		<li><a href="player.php">Character</a></li>
	      		<li class="active"><a href="enemy.php">Enemies</a></li>
	      		<li><a href="tasks.php">Tasks</a></li>
	      		<li><a href="#">Fight</a></li>
	    	</ul>
	    </div>
	</nav>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>



<?php	
	require_once ("../database/DbConfig.php");

	$conn = DbConfig::getInstance();
	

	//get enemy data
	$query = "SELECT * FROM enemy";
	$stmt = $conn->prepare($query);	
	$result = $stmt->execute();
	$result = $stmt->fetchAll();	

	//tabe enemy data
	echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
		echo "<thead>";	
			echo "<tr>";
				echo "<td>Name</td>";
				echo "<td>HP</td>";
				echo "<td>STR</td>";
				echo "<td>LV</td>";	
				echo "<td>action</td>";
			echo "</tr>";
		echo "</thead>";

	foreach ($result as $enemy) {		
			
		//echo "<img src='../image/".$movie['picture']."' />";
		echo"<tbody>";
			echo"<tr>";
				echo "<td>{$enemy['enemy_name']}</td>";
				echo "<td>{$enemy['enemy_hp']}</td>";
				echo "<td>{$enemy['enemy_str']}</td>";
				echo "<td>{$enemy['enemy_lvl']}</td>";		
				echo"<td><a href='fight.php?enemyName={$enemy['enemy_name']}&enemyHp={$enemy['enemy_hp']}&enemyStr={$enemy['enemy_str']}&enemyLvl={$enemy['enemy_lvl']}'class='btn btn-primary' class='btn btn-primary'>Fight</td>";		
			echo"</tr>";
		echo"</tbody>";		
	}
	echo"</table>";
?>

