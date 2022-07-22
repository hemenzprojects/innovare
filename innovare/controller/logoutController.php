<?php 

	if ($innovare->is_AdminLoggedin()) {
		if($innovare->doLogoutSpaceGhUser()){
			$innovare->redirect($properties['baseurl']);
		}
	}

?>