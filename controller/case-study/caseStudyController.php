<?php
// -- GET CASE STUDY INFO -- //
	
	if (isset($_GET['caseStudy_slug'])) {

		$caseStudy_slug = strip_tags($_GET['caseStudy_slug']);

		$caseStudy_info =  json_encode($innovare->getCaseStudyBySlug($caseStudy_slug));

		$caseStudy_info = json_decode($caseStudy_info);

		// var_dump($caseStudy_info);die();
	}


// -- GET CASE STUDY CATEGORY INFO -- //
	
	if (isset($_GET['caseStudy_cat_slug']) && isset($_GET['caseStudy_cat_id'])) {

		$caseStudy_cat_id = strip_tags($_GET['caseStudy_cat_id']);

		$caseStudy_cat_slug = strip_tags($_GET['caseStudy_cat_slug']);

		// Get category info
		$caseStudy_cat_info =  json_encode($innovare->getCaseStudyCatByID($caseStudy_cat_id));

		$caseStudy_cat_info = json_decode($caseStudy_cat_info);

		// var_dump($course_cat_info);die();

		// Get Courses with same category
		// $course_cat_courses =  json_encode($innovare->getCourseCountByCatID($caseStudy_cat_id));

		// $course_cat_courses = json_decode($course_cat_courses);

		// echo $course_cat_courses;die();

		
	}
?>