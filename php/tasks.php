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
					echo"<td><a href='dotask.php?taskName={$task['task_title']}&taskDetails={$task['task_details']}&taskGold={$task['reward_gold']}&taskExp={$task['reward_exp']}&taskTime={$task['task_time']}'class='btn btn-primary'>Work!</td>";		
				echo"</tr>";
			echo"</tbody>";		
	}
		echo"</table>";


		
	//--------------------task complete--------------------------------------------------
		//code ...
 ?>
