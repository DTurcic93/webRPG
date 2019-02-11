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
	      		<li><a href="tasks.php">Tasks</a></li>
	      		<li><a href="#">Fight</a></li>
	      		<li><a href="merch.php  ?>">Store</a></li>
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

	//get player data
	$query = "SELECT * FROM player";
	$stmt = $conn->prepare($query);	
	$result = $stmt->execute();
	$result = $stmt->fetchAll();	

	//get inventory and items data
	$query2 ="SELECT player_inventory.eq_id,player_inventory.it_id, player_inventory.ammount, items.title,items.details,items.id, player_inventory.play_id
			FROM player_inventory
			INNER JOIN items ON player_inventory.it_id=items.id
			WHERE player_inventory.it_id=items.id";


	$stmt2 = $conn->prepare($query2);	
	$result2 = $stmt2->execute();
	$result2 = $stmt2->fetchAll();

	


	//player data table

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
				echo"<td hidden>{$player['player_id']}</td>";
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


	//invenotry data table

	echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
		echo "<thead>";	
			echo"<caption>INVENTORY</caption>";
				echo "<tr>";
					echo "<td>Title</td>";
					echo "<td>Details</td>";
					echo "<td>Ammount</td>";	
					echo "<td>EQ</td>";
				echo "</tr>";
		echo "</thead>";	

	foreach ($result2 as $inv) {		
			if ($player['player_id']==$inv['play_id']&& $inv['it_id']==$inv['id']){
				//echo "<img src='../image/".$movie['picture']."' />";
				echo"<tbody>";
					echo"<tr>";
						echo "<td>{$inv['title']}</td>";
						echo "<td>{$inv['details']}</td>";
						echo "<td>{$inv['ammount']}</td>";
						echo "<td>{$inv['eq_id']}</td>";
						echo"<td><a href='equip.php?itemID={$inv['it_id']}&itemEq={$inv['eq_id']}&playerID={$inv['play_id']}&ammount={$inv['ammount']}' class='btn btn-primary'>equip</td>";	
					echo"</tr>";
				echo"</tbody>";	
			}	
		}					
	
	echo"</table>";





	//get eq data
	$query5 = "SELECT * FROM equiped";
	$stmt = $conn->prepare($query5);	
	$result5 = $stmt->execute();
	$result5 = $stmt->fetchAll();

	
	echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
		echo "<thead>";	
			echo"<caption>EQUIPED</caption>";
				echo "<tr>";
					echo "<td>id</td>";
					echo "<td>eq</td>";
					echo "<td>itID</td>";						
				echo "</tr>";
		echo "</thead>";	

	foreach ($result5 as $eq) {				
				//echo "<img src='../image/".$movie['picture']."' />";
				echo"<tbody>";
					echo"<tr>";
						echo "<td>{$eq['id']}</td>";
						echo "<td>{$eq['equipid']}</td>";
						echo "<td>{$eq['item_id']}</td>";
						echo "<td hidden>{$eq['playerid']}</td>";
						echo "<td hidden>{$eq['ammount']}</td>";
						echo"<td><a href='unequip.php?itemID={$eq['item_id']}&itemEq={$eq['equipid']}&playerID={$eq['playerid']}&ammount={$eq['ammount']}'class='btn btn-primary'>unequip</td>";	
					echo"</tr>";
				echo"</tbody>";	
			}						
	
	echo"</table>";
	/////http://localhost/šibanje/php/player.php
?>

