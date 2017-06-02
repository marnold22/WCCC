<?php /* Template Name: giving-template */
  get_header();
  $category = 'giving';

  //header section
  echo createFullWidthImageComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('full-width-image')));

  //call to action components
  $components = createCallToActionComponentForCategoryAndTags(array('category'=>$category, 'tags'=>array('call-to-action')));
  $left_content = (count($components) > 0 ? $components[0] : '');
  $right_content = (count($components) > 1 ? $components[1] : '');
  echo createHalfHalfComponent(array('left_content'=>$left_content,'right_content'=>$right_content));

  //text image section
  $components = createTextImageComponentsForCategoryAndTags(array('category'=>$category, 'tags'=>array('text-image'), 'number_desired'=>null, 'image_on_left'=>false));
  print_component_array($components);


  //get_template_part('assets/partials/partners-spotlight');
  echo createHeadingComponent(array('title'=>'Donor Spotlight'));
  echo do_shortcode('[abcf-staff-list id="277"]');



  // $partners = array('City of Spokane', 'County of Spokane', 'Emmerson-Garfield Neighborhood Council', 'Empire Health Foundation', 'Spokane Parks and Recreation', 'Washington State Department of Health', 'Welty Foundation', 'West Central Neighborhood Council', 'Women Helping Women', 'Airway Heights Community Center', 'Cheney United Methodist Church', 'Community Prevention and Wellness Initiative of Spokane County', 'Fairchild Airforce Base', 'Greater Spokane Substance Abuse Council', 'I-Choice', 'Moling Healthcare', 'Our Place', 'Project Hope', 'Second Harvest Food Bank', 'Spokane COPS', 'Spokane Falls Family Clinic', 'Spokane Hoopfest', 'Spokane Public Schools', 'Spokane Regional Health District', 'West Spokane Kiwanis', 'Youth for Christ');
  echo createHeadingComponent(array('title'=>'Our Partners'));
  echo do_shortcode('[abcf-staff-list id="278"]');
  // echo createPartnerListComponent(array('title'=>$title, 'partners'=>$partners));


  get_footer();
?>
