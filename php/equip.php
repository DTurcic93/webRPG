<?php

	require_once("../database/DbConfig.php");
	$conn = DbConfig::getInstance();

	$itemID=$_GET['itemID'];
	$equipID=$_GET['itemEq'];
	$playerID=$_GET['playerID'];
	$ammount=$_GET['ammount'];


	$query="INSERT INTO  equiped (equipid,item_id,playerid,ammount) VALUES($equipID,$itemID,$playerID,$ammount)";
	$stmt=$conn->prepare($query);
	$result=$stmt->execute();

	$query2="DELETE FROM player_inventory WHERE it_id=$itemID AND eq_id = $equipID;";
	$stmt2=$conn->prepare($query2);
	$res2=$stmt2->execute();



	



	header ('Location: player.php');

	?>

	
