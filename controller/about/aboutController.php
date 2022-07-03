<?php 

// -- GET TEAM MEMBER INFO -- //
	
	if (isset($_GET['team_member_slug'])) {

		$team_member_slug = $_GET['team_member_slug'];

		$team_member_info =  json_encode($innovare->getTeamBySlug($team_member_slug));

		$team_member_info = json_decode($team_member_info);
	}


?>