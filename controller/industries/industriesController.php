<?php

	// -- GET INDUSTRY INFO -- //
	
	if (isset($_GET['industry_slug'])) {

		$industry_slug = strip_tags($_GET['industry_slug']);

		$industry_info =  json_encode($innovare->getIndustriesBySlug($industry_slug));

		$industry_info = json_decode($industry_info);

		// var_dump($course_info);die();
	}


?>