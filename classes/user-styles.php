<?php

class userStyles {

  private $userValues;

  function __construct($userVals) {
      $this->userValues = $userVals;
  }

  public function getUserStyles() {

          

          $output;
          $output = '[';
          $output .= '{"elementType": "geometry", "stylers": [{"color": "' . $this->userValues['geometryColor'] . '"}]},';
          $output .= '{"elementType": "labels.icon", "stylers": [{ "visibility": "' . $this->userValues['labelsIconColor'] . '"}]},';
          $output .= '{"elementType": "labels.text.fill", "stylers": [{ "color": "' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"elementType": "labels.text.stroke", "stylers": [{ "color": "' . $this->userValues['primaryTextStrokeColor'] . '"}]},';
          $output .= '{"featureType": "administrative.land_parcel", "elementType": "labels", "stylers": [{ "visibility": "off" }]},';
          $output .= '{"featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{ "color": "' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "administrative.neighborhood","elementType": "labels.text.fill","stylers": [{"color": "' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "poi","elementType": "geometry","stylers": [{"color":"' . $this->userValues['poiColor'] . '"}]},';
          $output .= '{"featureType": "poi","elementType": "labels.text","stylers": [{"visibility":"' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "poi","elementType": "labels.text.fill","stylers": [{"color":"' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "poi.park","elementType": "geometry","stylers": [{"color":"' . $this->userValues['poiColor'] . '"}]},';
          $output .= '{"featureType": "poi.park","elementType": "labels.text.fill","stylers": [{"color":"' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "road","elementType": "geometry","stylers": [{"color":"' . $this->userValues['roadColor'] . '"}]},';
          $output .= '{"featureType": "road.arterial","elementType": "geometry.fill","stylers": [{"color":"' . $this->userValues['roadColor'] . '"},{"lightness": 5}]},';
          $output .= '{"featureType": "road.arterial","elementType": "labels","stylers": [{"visibility": "off"}]},';
          $output .= '{"featureType": "road.arterial","elementType": "labels.text.fill","stylers": [{"color":"' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "road.highway","elementType": "geometry","stylers": [{"color":"' . $this->userValues['highwayColor'] . '"}]},';
          $output .= '{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color":"' . $this->userValues['highwayColor'] . '"}]},';
          $output .= '{"featureType": "road.highway","elementType": "labels","stylers": [{"visibility": "off"}]},';
          $output .= '{"featureType": "road.highway","elementType": "labels.text.fill","stylers": [{"color":"' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "road.highway.controlled_access","elementType": "geometry.fill","stylers": [{"color":"' . $this->userValues['roadColor'] . '"},{"lightness": 40},{"weight": 5.5}]},';
          $output .= '{"featureType": "road.local","stylers": [{"visibility": "off"}]},';
          $output .= '{"featureType": "road.local","elementType": "geometry.fill","stylers": [{"lightness": 60}]},';
          $output .= '{"featureType": "road.local","elementType": "geometry.stroke","stylers": [{"color":"' . $this->userValues['geometryStrokeColor'] . '"}]},';
          $output .= '{"featureType": "road.local","elementType": "labels","stylers": [{"visibility": "off"}]},';
          $output .= '{"featureType": "road.local","elementType": "labels.text.fill","stylers": [{"color":"' . $this->userValues['primaryTextColor'] . '"}]},';
          $output .= '{"featureType": "transit.line","elementType": "geometry","stylers": [{"color":"' . $this->userValues['transitLineColor'] . '"}]},';
          $output .= '{"featureType": "transit.station","elementType": "geometry","stylers": [{"color":"' . $this->userValues['transitStationColor'] . '"}]},';
          $output .= '{"featureType": "water","elementType": "geometry","stylers": [{"color":"' . $this->userValues['waterColor'] . '"}]},';
          $output .= '{"featureType": "water","elementType": "labels.text.fill","stylers": [{"color":"' . $this->userValues['waterColor'] . '"}]}';
          $output .= ']';

          return $output;

  }

}