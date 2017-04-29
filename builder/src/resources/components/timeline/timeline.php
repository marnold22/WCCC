<?php
//array('number'=>$number, 'subtitle'=>$subtitle, 'title'=>$title, 'description'=>$description, 'imageRef'=>$imageRef)
function createTimelineComponent($args){
	//setup
	$m = new Mustache_Engine(array(
		'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
	));
	$tpl = $m->loadTemplate('timeline-section-template');
	return $tpl->render($args);

}

?>


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<section class="timeline anchor" id=timeline name="timeline" title="Timeline" >
	<div class="demo-card-wrapper">

		<?php
			for($i = 1; $i < 6; $i++){
				echo createTimelineComponent(array('number'=>$i, 'subtitle'=>'subtitle', 'title'=>'title', 'description'=>'description description description description description description description description description description description description description description ', 'imageRef'=>'http://placehold.it/1000x500'));
			}
		?>

	</div>
</section>
