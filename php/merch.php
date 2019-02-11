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
	      		<li><a href="player.php  ?>">Character</a></li>
	      		<li><a href="enemy.php">Enemies</a></li>
	      		<li><a href="tasks.php  ?>">Tasks</a></li>
	      		<li><a href="#">Fight</a></li>	      		
	      		<li class="active"><a href="merch.php">Store</a></li>
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
		

	//get shop items
	$query1 = "SELECT * FROM items WHERE id != 1";
	$stmt = $conn->prepare($query1);	
	$result1 = $stmt->execute();
	$result1 = $stmt->fetchAll();

	//get player gold
	$query2 = "SELECT ammount FROM player_inventory WHERE it_id = 1";
	$stmt = $conn->prepare($query2);	
	$result2 = $stmt->execute();
	$result2 = $stmt->fetchAll();

	$query3 = "SELECT * FROM player ";
	$stmt = $conn->prepare($query3);	
	$result3 = $stmt->execute();
	$result3 = $stmt->fetchAll();

	foreach ($result3 as $player ) {
			$player['player_id'];
		}	


	foreach ($result2 as $g) {
		echo "Your Gold: ";
		echo $g['ammount'];
	}


	echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
		echo "<thead>";	
			echo"<caption>shop</caption>";
				echo "<tr>";
					echo "<td>Title</td>";
					echo "<td>Details</td>";					
					echo "<td>buy price</td>";	
					echo "<td>equip id</td>";				
				echo "</tr>";
		echo "</thead>";

	foreach ($result1 as $item) {		
			
		//echo "<img src='../image/".$movie['picture']."' />";
		echo"<tbody>";
			echo"<tr>";
				echo "<td>{$item['title']}</td>";
				echo "<td>{$item['details']}</td>";				
				echo "<td>{$item['buying_price']}</td>";
				echo "<td>{$item['equip_id']}</td>";
				echo"<td><a href='buy.php?itemId={$item['id']}&itemName={$item['title']}&itemDetails={$item['details']}&itemPrice={$item['buying_price']}&playerId={$player['player_id']}&equipID={$item['equip_id']}' class='btn btn-primary'>Buy</td>";				
			echo"</tr>";
		echo"</tbody>";		
	}
	echo"</table>";
	echo"<br>";

?>