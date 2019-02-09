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
	      		<li class="active"><a href="tasks.php">Tasks</a></li>
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

	
	//get tasks
	$queryTask = "SELECT * FROM tasks";
	$stmtTask = $conn->prepare($queryTask);	
	$resultTask= $stmtTask->execute();
	$resultTask= $stmtTask->fetchAll();

	foreach ($resultTask as $task) {
	
	$taskID=$task['task_id'];
	$taskTitle=$task['task_title'];	
	$taskDetails=$task['task_details'];
	$taskGold=$task['reward_gold'];
	$taskExp=$task['reward_exp'];
	$taskTime=$task['task_time']; 		
}		

		//task table info
		echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
		echo "<thead>";	
		echo"<caption>TASKS</caption>";
		echo "<tr>";
		echo "<td>Title</td>";
		echo "<td>Details</td>";
		echo "<td>Gold Reward</td>";
		echo "<td>Exp Reward</td>";
		echo "<td>Time</td>";
		echo "<td>Action</td>";		
		echo "</tr>";
		echo "</thead>";

	foreach ($resultTask as $task) {		
			
		//echo "<img src='../image/".$movie['picture']."' />";
		echo"<tbody>";
		echo"<tr>";
		echo "<td>{$task['task_title']}</td>";
		echo "<td>{$task['task_details']}</td>";
		echo "<td>{$task['reward_gold']}</td>";
		echo "<td>{$task['reward_exp']}</td>";
		echo "<td>{$task['task_time']}</td>";
		echo"<td><a href='dotask.php?taskName={$taskTitle}&taskDetails={$taskDetails}&taskGold={$taskGold}&taskExp={$taskExp}&taskTime={$taskTime}'class='btn btn-primary' class='btn btn-primary'>Work!</td>";		
		echo"</tr>";
		echo"</tbody>";		
	}
		echo"</table>";
		



























/*

		$HP=$playerHp;
		//battle info
		echo"<div class='dropdown'>";
  		echo"<span>[Battle Result]</span>";
  		echo"<div class='dropdown-content'>";
  		//šibanje(fight)
		while(($enemyHp>0)||($player['player_hp']>0)){
			
			$r=$r+1;
			$pDamage=$player['player_str']*1.5;
	 		$enemyHp=$enemyHp-$pDamage;
	 		$eDamage=$enemyStr*1.5;
			$playerHp=$playerHp-$eDamage;

			echo "<p style='color:black;'>ROUND{$r}</p><hr>"; 		
	 		echo"<p style='color:green;'>{$playerName} did {$pDamage} damage and {$enemyName} have {$enemyHp} hp left.</p> <br>"; 		 		
			echo "<p style='color:red;'>{$enemyName} did {$eDamage} damage and {$playerName} have {$playerHp} left.</p> <br>";

			//PLAYER WON
 		if ($enemyHp<=0) { 
 			$con = mysqli_connect('localhost', 'root', '', 'webrpg');			
 			$EXPgain=$enemyLvl*10;
 			$GoldGain=$enemyLvl*20;
 			$playerExp=$playerExp+$EXPgain;
 			

 			$playerEXP=mysqli_real_escape_string($con,$playerExp);
 			$goldGain=mysqli_real_escape_string($con,$GoldGain); 

 			$query1="UPDATE player SET player_exp = $playerEXP WHERE player_id =$playerID;";
 			$query2="UPDATE player_inventory SET ammount = ammount + $goldGain WHERE play_id =$playerID AND it_id =1 ;";
 
				$stmt1 = $conn->prepare($query1);	
				$result1 = $stmt1->execute();
				$stmt2 = $conn->prepare($query2);	
				$result2 = $stmt2->execute();

 			echo"<p style='color:gold;'>{$player['player_name']} Won</p><br>"; 			
 			echo"<p style='color:blue;'>{$playerName} got {$EXPgain} Exp and now have {$playerExp}.</p><br>"; 			
 			echo"<p style='color:blue;'>{$playerName} got {$GoldGain} gold.</p>";

 			//LV-UP
 			if (($playerExp == $playerXpNeed)||($playerExp > $playerXpNeed)) {
 				
 				$con = mysqli_connect('localhost', 'root', '', 'webrpg');
 				$playerExp=0;
 				$playerStr=$playerStr+2;
 				$playerLvl=$playerLvl+1;
 				$HPUP=10; 								
 				$playerHp=$HP + $HPUP;
 				$playerXpNeed=$playerXpNeed*2;
 				echo"{$playerName} Lv-up!";

 				$playerHP=mysqli_real_escape_string($con,$playerHp);
 				$playerLvlUp=mysqli_real_escape_string($con,$playerLvl);
 				$playerSTR=mysqli_real_escape_string($con,$playerStr); 
 				$playerXP=mysqli_real_escape_string($con,$playerExp);       
			    $playerXpNeedd=mysqli_real_escape_string($con,$playerXpNeed);   
			    			    
			    $query="UPDATE player SET player_hp = $playerHP, player_lvl = $playerLvlUp, xp_need = $playerXpNeedd, player_exp = $playerXP, player_str=$playerSTR	WHERE player_id =$playerID;";
 
				$stmt = $conn->prepare($query);	
				$result = $stmt->execute();
				
 			}

 			die();
 				//player LOST
 		}elseif ($playerHp<=0) {
 			echo"Enemy Won";
 			die();
 		}
		}	 		
  		echo"</div>";
	echo"</div>";

*/
 ?>
