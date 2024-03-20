<?php

class userStyles {

  private $userStyleValues;

  function __construct($userVals) {
      $this->userStyleValues = $userVals;
  }

  public function getStyleObject($set) {

          $feature;
          $element;
          $visibility;
          $color;
          $hue = "";
          $lightness = "";
          $saturation = "";
          $gamma = "";
          $weight = "";

          $styleObject = '{';

          if (isset($set['featureType'])) :
          $feature = $set['featureType'];
          $styleObject .= '"featureType":"' . $feature . '",'; 
          endif;
          if (isset($set['elementType'])) :
          $element = $set['elementType'];
          $styleObject .= '"elementType":"' . $element . '",';  
          endif;
          $styleObject .= '"stylers":[';
          if (isset($set['visibility'])) :
          $visibility = $set['visibility'];
          $styleObject .= '{"visibility":"' . $visibility . '"},';
          endif;
          if (isset($set['color'])) :
          $color = $set['color'];
          $styleObject .= '{"color":"' . $color . '"},';
          endif;
          if (isset($set['hue'])) :
          $hue = $set['hue'];
          $styleObject .= '{"hue":"' . $hue . '"},';
          endif;
          if (isset($set['lightness'])) :
          $lightness = $set['lightness'];
          $styleObject .= '{"lightness":' . $lightness . '},';
          endif;
          if (isset($set['saturation'])) :
          $saturation = $set['saturation'];
          $styleObject .= '{"saturation":' . $saturation . '},';
          endif;
          // if (isset($set['gamma'])) :
          // $gamma = $set['gamma'];
          // $styleObject .= '{"gamma":' . $gamma . '},';
          // endif;
          if (isset($set['weight'])) :
          $weight = $set['weight'];
          $styleObject .= '{"weight":' . $weight . '},'; 
          endif; 
          $styleObject .=']},';


          return $styleObject;

  }

  public function getUserStyles() {

            // $features = array();
            $output;
            $output = '[';

            foreach ($this->userStyleValues as $set) {

              if (is_array($set)) :
              $output .= $this->getStyleObject($set);
              endif;

              if (isset($set['subFeatureTypes'])) {
                foreach($set['subFeatureTypes'] as $subFeature) {
                  if (is_array($subFeature)) :
                  $output .= $this->getStyleObject($subFeature);
                  endif;

                  if (isset($subFeature['subFeatureTypes'])) {
                    foreach($subFeature['subFeatureTypes'] as $bottomFeature) {
                      if (is_array($bottomFeature)) :
                      $output .= $this->getStyleObject($bottomFeature);
                      endif;

                    }
                  }
                }
              }

          }

          
          $output .= ']';

          return $output;

  }

}