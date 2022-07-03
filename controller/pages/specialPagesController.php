<?php
// -- GET THOUGHT LEADERSHIP INFO -- //
	
	if (isset($_GET['special_page_slug'])) {

		$special_page_slug = strip_tags($_GET['special_page_slug']);

		$special_page_info =  json_encode($innovare->getActivePagesBySlug($special_page_slug));

		$special_page_info = json_decode($special_page_info);

		// var_dump($consulting_info);die();
	}
?>
