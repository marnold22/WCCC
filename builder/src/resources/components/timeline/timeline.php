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
<section class="timeline" id="timeline" >
	<div class="demo-card-wrapper">

		<?php echo createTimelineComponent(array('number'=>'1', 'subtitle'=>'', 'title'=>'1981-1991', 'description'=>'The West Central Community Center opens its doors to serve the neighborhoods of West Central, Emerson-Garfield and Northwest (now Audubon/Downriver) providing child care, health services, youth recreation and development and supportive services for developmentally disabled adults.', 'imageRef'=>'http://placehold.it/1000x500'));?>

		<?php echo createTimelineComponent(array('number'=>'2', 'subtitle'=>'', 'title'=>'1991-2001', 'description'=>'Neighborhood improvement initiatives are instituted to address code violations and crime and to create a sense of community for the families we serve.  Project Pride, COPS-WEST and the West Central Neighborhood Coalition are among the programs established.', 'imageRef'=>'http://placehold.it/1000x500'));?>

		<?php echo createTimelineComponent(array('number'=>'3', 'subtitle'=>'', 'title'=>'2001-2010', 'description'=>'The West Central Community Center is expanded to address growing neighborhood needs and includes additional classrooms for pre-kindergarten children and expanded medical facilities.  WCCC is now serving more than 4,000 individuals annually.', 'imageRef'=>'http://placehold.it/1000x500'));?>

		<?php echo createTimelineComponent(array('number'=>'4', 'subtitle'=>'', 'title'=>'2010-Present', 'description'=>'Youth Development programming now includes Outdoor Wilderness Learning.  Funding is achieved to build a five-bay garage for Center vehicles.  Spokane Police Department has established a permanent presence on site.  Women, Infants and Children serves 3,000 clients monthly.  And, Supportive Services has grown to be the second largest program for disabled adults in the County.', 'imageRef'=>'http://placehold.it/1000x500'));?>

	</div>
</section>
