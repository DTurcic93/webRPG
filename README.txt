///////WEB-RPG GAME\\\\\\\



content( 
	3 main pages(

		- player.php(
			-player Character overview
				-query that select all data from  table player  and table player_inventory 
				-table with player and inventory data
		)

		- enemies.php(
			-list of enemies player can fight against
				- query that select all data from table enemy
				- table with  enemy data

			-when player press button fight it collect enemy data and send it to fight.php where it is used for  combat
		)

		- tasks.php(
			-list of tasks that can be done
				-query that select all data from table tasks
				-table with all tasks and their data

			-when player press button work it collect task data and send it to dotask.php where it is used for doing task
		)
	)

	2 secondary pages(

		- fight.php(
			-player and enemy data table
				-query that select  data from  player 
				-enemy data is collected on enemies.php  
				-table with player and inventory data

			-on hover dropdown that contain battle report

			- battle player vs enemy
				-while loop untill enemy or player hp reaches 0
					- echo player and enemy damage dealt
					- echo remaining player and enemy hP

			-player win
				- if statement which check if enemy HP <= 0
					- if yes player is rewarded with gold and exp
						- query that UPDATE gold ammount and exp ammount
						- also echo how much gold and exp is player rewarded with

			-Lv up
				-if statement that check if player exp is >= xp_neded
					- if yes player is rewarded with bonus STR bonsu HP and player Lv is +1
						- query for updating str, hp, xp_neded and lv data 

			-player lost
				-else if that check if player hp is 0 or less
					- if yes it echo player lost 
					- will add more later (on loss player will lose energie...if player is out of energie no fighting can be done)
		)

		-dotask.php(
			-get player and task data
				- query that select all player and player_inventory data (task data is sent from task.php)

			- table with selected task data ( selected on task.php)

			- will add later
				-timer for doing task
					-while timer is on player will not be able to fight

				- add rewards to player for completing task
				...
		)
	)
)