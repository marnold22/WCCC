<?php
require_once(get_template_directory().'/assets/util/Mustache/Autoloader.php');
Mustache_Autoloader::register();

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

		<!-- <div class="demo-card demo-card--step1 ">
			<div class="head">
				<div class="number-box">
					<span>01</span>
				</div>
				<h2><span class="small">Subtitle</span> Technology</h2>
			</div>
			<div class="body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
				<img src="http://placehold.it/1000x500" alt="Graphic">
			</div>
		</div>

		<div class="demo-card demo-card--step2 ">
			<div class="head">
				<div class="number-box">
					<span>01</span>
				</div>
				<h2><span class="small">Subtitle</span> Technology</h2>
			</div>
			<div class="body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
				<img src="http://placehold.it/1000x500" alt="Graphic">
			</div>
		</div>

		<div class="demo-card demo-card--step2">
			<div class="head">
				<div class="number-box">
					<span>02</span>
				</div>
				<h2><span class="small">Subtitle</span> Confidence</h2>
			</div>
			<div class="body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
				<img src="http://placehold.it/1000x500" alt="Graphic">
			</div>
		</div>

		<div class="demo-card demo-card--step3">
			<div class="head">
				<div class="number-box">
					<span>03</span>
				</div>
				<h2><span class="small">Subtitle</span> Adaptation</h2>
			</div>
			<div class="body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
				<img src="http://placehold.it/1000x500" alt="Graphic">
			</div>
		</div>

		<div class="demo-card demo-card--step4">
			<div class="head">
				<div class="number-box">
					<span>04</span>
				</div>
				<h2><span class="small">Subtitle</span> Consistency</h2>
			</div>
			<div class="body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
				<img src="http://placehold.it/1000x500" alt="Graphic">
			</div>
		</div> -->

		<!-- <div class="demo-card demo-card--step5">
			<div class="head">
				<div class="number-box">
					<span>05</span>
				</div>
				<h2><span class="small">Subtitle</span> Conversion</h2>
			</div>
			<div class="body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta reiciendis deserunt doloribus consequatur, laudantium odio dolorum laboriosam.</p>
				<img src="http://placehold.it/1000x500" alt="Graphic">
			</div>
		</div> -->

	</div>
</section>
