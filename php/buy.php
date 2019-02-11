<?php

	require_once("../database/DbConfig.php");
	$conn = DbConfig::getInstance();
	

	$playerId=$_GET['playerId'];

	$itemId=$_GET['itemId'];
	$itemTitle=$_GET['itemName'];
	$itemDetails=$_GET['itemDetails'];
	$itemPrice=$_GET['itemPrice'];
	$itemEqId=$_GET['equipID'];





	$con = mysqli_connect('localhost', 'root', '', 'webrpg');

	$play_id=mysqli_real_escape_string($con,$playerId); 
	$it_id=mysqli_real_escape_string($con,$itemId);
	

	
		
	$query="INSERT  into player_inventory (play_id,it_id,ammount, eq_id) VALUES($playerId,$itemId,1,$itemEqId)";
	
	$stmt=$conn->prepare($query);
	$result=$stmt->execute();

	header ('Location: merch.php');



	
?>