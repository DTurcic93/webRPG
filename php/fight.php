 <!DOCTYPE html>
<html>
<head>
	<title>šibanje</title>	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<style>
.dropdown {
  position:relative; margin:0px 750px auto;
  display: inline-block;
}

.dropdown-content {
  display: none;  
  position:relative; margin:0px auto;
  background-color: #f9f9f9;
  min-width: 750px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
  position:relative; margin:0px -350px auto;
}
</style>
	
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
	      		<li class="active"><a href="fight.php">Fight</a></li>      		
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
 		//collecting enemy data
	 $enemyName = $_GET['enemyName'];
	 $enemyHp = $_GET['enemyHp'];
	 $enemyStr = $_GET['enemyStr'];
	 $enemyLvl = $_GET['enemyLvl'];

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


	/*------player table info--------------------------------------------------------*/
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
						echo "<td>Exp to Lv-up</td>";
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
		echo"<p style='margin: 0 auto; width:50px;'>[VS]</p>";
		echo"<br>";

	/*------enemy table info--------------------------------------------------------*/
		echo "<table class='table table-striped' style='margin: 0 auto; width:750px;'>";
			echo "<thead>";	
				echo"<caption>Enemy</caption>";
					echo "<tr>";
						echo "<td>Name</td>";
						echo "<td>HP</td>";
						echo "<td>STR</td>";
						echo "<td>Lv</td>";		
					echo "</tr>";
				echo "</thead>";
			echo"<tbody>";
				echo"<tr>";
					echo "<td> {$enemyName}</td>";
					echo "<td> {$enemyHp}</td>";
					echo "<td> {$enemyStr}</td>";
					echo "<td> {$enemyLvl}</td>";		
				echo"</tr>";
			echo"</tbody>";	
		echo"<br>";


		
	/*------šibanje(fight)--------------------------------------------------------*/
		$r=0;
		$HP=$playerHp;
		//battle info
		echo"<div class='dropdown'>";
  			echo"<span>[Battle Result]</span>";
  				echo"<div class='dropdown-content'>";
  		  			//fighting
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
?>