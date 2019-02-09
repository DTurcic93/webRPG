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
	      		<li><a href="enemy.php">Enemies</a></li>
	      		<li><a href="tasks.php">Tasks</a></li>
	      		<li><a href="#">Fight</a></li>
	      		<li class="active"><a href="dotask.php">Work!</a></li>	      		
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
	
	//collecting task data
	 $TaskTitle = $_GET['taskName'];
	 $TaskDetails = $_GET['taskDetails'];
	 $TaskGold = $_GET['taskGold'];
	 $TaskExp = $_GET['taskExp'];
	 $TaskTime = $_GET['taskTime'];


	require_once ("../database/DbConfig.php");
	$conn = DbConfig::getInstance();

	//geting player data
	$query = "SELECT * FROM player";
	$stmt = $conn->prepare($query);	
	$result = $stmt->execute();
	$result = $stmt->fetchAll();	


	foreach ($result as $player) {
	
	$playerID=$player['player_id'];
 	$playerName =$player['player_name'];
 	$playerHp = $player['player_hp'];
 	$playerStr = $player['player_str'];
 	$playerLvl = $player['player_lvl'];
 	$playerExp = $player['player_exp'];
 	$playerEnergie = $player['player_energie'];
 	$playerXpNeed =$player['xp_need'];

}

		//get inventory
	$queryINV = "SELECT * FROM player_inventory";
	$stmtINV = $conn->prepare($queryINV);	
	$resultINV= $stmtINV->execute();
	$resultINV = $stmtINV->fetchAll();

	foreach ($resultINV as $inv) {
	
	$invID=$inv['inv_id'];
 	$playID =$inv['play_id'];
 	$itID = $inv['it_id'];
 	$Ammount = $inv['ammount']; 	
}



		echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
			echo "<thead>";	
				echo"<caption>TASKS</caption>";
					echo "<tr>";
						echo "<td>Title</td>";
						echo "<td>Details</td>";
						echo "<td>Gold Reward</td>";
						echo "<td>Exp Reward</td>";
						echo "<td>Time(s)</td>";							
					echo "</tr>";
			echo "</thead>";
			echo"<tbody'>";
				echo"<tr>";
					echo "<td>{$TaskTitle}</td>";
					echo "<td>{$TaskDetails}</td>";
					echo "<td>{$TaskGold}Gold</td>";
					echo "<td>{$TaskExp}EXP</td>";
					echo "<td>{$TaskTime}</td>";			
				echo"</tr>";
			echo"</tbody>";			
		echo"</table>";
?>