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
	      		<li class="active"><a href="player.php">Character</a></li>
	      		<li><a href="enemy.php">Enemies</a></li>
	      		<li><a href="tasks.php  ?>">Tasks</a></li>
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

	//dohvati sve podatke o igracu
	$query = "SELECT * FROM player";
	$stmt = $conn->prepare($query);	
	$result = $stmt->execute();
	$result = $stmt->fetchAll();	

	//dohvati sve o inventoriy i items
	/*$query2="SELECT player_inventory.ammount,'items.title','items.details'
			FROM ((player_inventory
			INNER JOIN player ON player_inventory.play_id = player.player_id)
			INNER JOIN player_inventory pi2 ON items.id=player_inventory.inv_id)
			WHERE ((player_inventory.play_id = player.player_id)
			player_inventory.it_id=items.id)";*/

	$query2 ="SELECT player_inventory.ammount, items.title,items.details,items.id, player_inventory.play_id
			FROM player_inventory
			INNER JOIN items ON player_inventory.it_id=items.id
			WHERE player_inventory.it_id=items.id";

	$query3 ="SELECT player_inventory.it_id, player.player_id, player.xp_need from player_inventory
			INNER JOIN player ON player_inventory.play_id=player.player_id
			WHERE player_inventory.play_id=player.player_id";


	$stmt2 = $conn->prepare($query2);	
	$result2 = $stmt2->execute();
	$result2 = $stmt2->fetchAll();

	$stmt3 = $conn->prepare($query3);	
	$result3 = $stmt3->execute();
	$result3 = $stmt3->fetchAll();


	//ispisi  o igracu

	echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
	echo "<thead>";	
	echo"<caption>PLAYER</caption>";
	echo "<tr>";
	echo "<td>Name</td>";
	echo "<td>HP</td>";
	echo "<td>STR</td>";
	echo "<td>XP</td>";
	echo "<td>ENERGIE</td>";
	echo "<td>LV</td>";
	echo "<td>Exp to LV-up</td>";
	echo "</tr>";
	echo "</thead>";
	foreach ($result as $player) {		
			
		//echo "<img src='../image/".$movie['picture']."' />";
		echo"<tbody>";
		echo"<tr>";
		echo "<td>{$player['player_name']}</td>";
		echo "<td>{$player['player_hp']}</td>";
		echo "<td>{$player['player_str']}</td>";
		echo "<td>{$player['player_exp']}</td>";
		echo "<td>{$player['player_energie']}</td>";
		echo "<td>{$player['player_lvl']}</td>";
		echo "<td>{$player['xp_need']}</td>";
		echo"</tr>";
		echo"</tbody>";		
	}
	echo"</table>";
	echo"<br>";


	//ispisi inventory

	echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
	echo "<thead>";	
	echo"<caption>INVENTORY</caption>";
	echo "<tr>";
	echo "<td>Title</td>";
	echo "<td>Details</td>";
	echo "<td>Ammount</td>";	
	echo "</tr>";
	echo "</thead>";	

	foreach ($result2 as $inv) {
		foreach ($result3 as $inv2) {
			if ($inv2['player_id']==$inv['play_id']&& $inv2['it_id']==$inv['id'])
				{
				//echo "<img src='../image/".$movie['picture']."' />";
				echo"<tbody>";
				echo"<tr>";
				echo "<td>{$inv['title']}</td>";
				echo "<td>{$inv['details']}</td>";
				echo "<td>{$inv['ammount']}</td>";		
				echo"</tr>";
				echo"</tbody>";	
			}
		}				
	}
	echo"</table>";


	/////http://localhost/šibanje/php/player.php
	

?>

