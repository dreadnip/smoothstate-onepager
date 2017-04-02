<?php

if(!r::ajax()) go(url('error'));

if(isset($_POST['project_id'])){			//	project images
	$project_id = $_POST['project_id'];
	$images = [];
	$projects = page('projecten')->children()->visible();
	foreach($projects as $project){
		if($project->num() == $project_id){
			$project_images = $project->images();
			foreach($project_images as $image){
				$images[] = $image->url();
			}
		}
	}
	echo json_encode($images);

}elseif(isset($_POST['slideshow'])){		//	home images

	$images = [];
	$projects = page('projecten')->children()->visible();
	foreach($projects as $project){
		$project_images = $project->images();
		foreach($project_images as $image){
			$images[] = $image->url();
		}
	}
	shuffle($images);
	echo json_encode($images);
}
?>