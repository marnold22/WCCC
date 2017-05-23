<?php

  //array('title'=>$title, 'partners'=>array('partner'))
  function createPartnerListComponent($args){

    $counter = 0;
    $left_content = '';
    $right_content = '';

    foreach ($args['partners'] as $partner) {
      if($counter < count($args['partners'])/2){
        $left_content .= ('<span class="partner">'.$partner.'</span><br>');
      }
      else{
        $right_content .= ('<span class="partner">'.$partner.'</span><br>');
      }
      $counter++;
    }

    $content = createHalfHalfComponent(array('left_content'=>$left_content,'right_content'=>$right_content));

    //setup
    $m = new Mustache_Engine(array(
        'loader' => new Mustache_Loader_FilesystemLoader(get_template_directory().'/assets/templates')
    ));
    $tpl = $m->loadTemplate('partner-list');
    return $tpl->render(array('title'=>$args['title'], 'content'=>$content));
  }

?>
