<div class="partner-list">

    <?php
      echo createHeadingComponent(array('title'=>'Our Partners'));

      $counter = 0;
      $left_content = '';
      $right_content = '';
      $partners = array('City of Spokane', 'County of Spokane', 'Emmerson-Garfield Neighborhood Council', 'Empire Health Foundation', 'Spokane Parks and Recreation', 'Washington State Department of Health', 'Welty Foundation', 'West Central Neighborhood Council', 'Women Helping Women', 'Airway Heights Community Center', 'Cheney United Methodist Church', 'Community Prevention and Wellness Initiative of Spokane County', 'Fairchild Airforce Base', 'Greater Spokane Substance Abuse Council', 'I-Choice', 'Moling Healthcare', 'Our Place', 'Project Hope', 'Second Harvest Food Bank', 'Spokane COPS', 'Spokane Falls Family Clinic', 'Spokane Hoopfest', 'Spokane Public Schools', 'Spokane Regional Health District', 'West Spokane Kiwanis', 'Youth for Christ');
      foreach ($partners as $partner) {
        if($counter < count($partners)/2){
          $left_content .= ('<span class="partner">'.$partner.'</span><br>');
        }
        else{
          $right_content .= ('<span class="partner">'.$partner.'</span><br>');
        }
        $counter++;
      }

      echo createHalfHalfComponent(array('left_content'=>$left_content,'right_content'=>$right_content));

    ?>

</div>
