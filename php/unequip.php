<?php

	require_once("../database/DbConfig.php");
	$conn = DbConfig::getInstance();

	$itemID=$_GET['itemID'];
	$equipID=$_GET['itemEq'];
	$playerID=$_GET['playerID'];
	$ammount=$_GET['ammount'];



	$query="DELETE FROM  equiped WHERE item_id=$itemID AND equipid = $equipID;";
	$stmt=$conn->prepare($query);
	$result=$stmt->execute();

	$query2="INSERT INTO player_inventory (play_id,it_id,ammount,eq_id) VALUES($playerID,$itemID,$ammount,$equipID) ";
	$stmt2=$conn->prepare($query2);
	$res2=$stmt2->execute();



	header ('Location: player.php');

	?>

	
