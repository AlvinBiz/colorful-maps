<?php

class GetArray {

    public $conditionalOptionsArray;

    function __construct() {
        $this->conditionalOptionsArray = array(
            'Administrative Global' => array(
                'getOption' => get_option('administrative-styles'), 
                'name' => 'administrative-styles', 
                'id' => 'administrative-styles',
                'featureType' => 'administrative'
            ),
            'Landscape Global' => array(
                'getOption' => get_option('landscape-styles'), 
                'name' => 'landscape-styles', 
                'id' => 'landscape-styles',
                'featureType' => 'landscape'
            ),
            'Landscape Man Made' => array(
                'getOption' => NULL, 
                'name' => 'landscape-styles[subFeatureTypes][man_made]', 
                'id' => 'landscape-styles-man_made',
                'featureType' => 'landscape.man_made'
            ),
            'Landscape Natural' => array(
                'getOption' => NULL, 
                'name' => 'landscape-styles[subFeatureTypes][natural]', 
                'id' => 'landscape-styles-natural',
                'featureType' => 'landscape.natural'
            ),
            'Poi Global' => array(
                'getOption' => get_option('poi-styles'), 
                'name' => 'poi-styles', 
                'id' => 'poi-styles',
                'featureType' => 'poi'
            ),
            'Poi Attraction' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][attraction]', 
                'id' => 'poi-styles-attraction',
                'featureType' => 'poi.attraction'
            ),
            'Poi Business' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][business]', 
                'id' => 'poi-styles-business',
                'featureType' => 'poi.business'
            ),
            'Poi Government' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][government]', 
                'id' => 'poi-styles-government',
                'featureType' => 'poi.government'
            ),
            'Poi Medical' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][medical]', 
                'id' => 'poi-styles-medical',
                'featureType' => 'poi.medical'
            ),
            'Poi Park' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][park]', 
                'id' => 'poi-styles-park',
                'featureType' => 'poi.park'
            ),
            'Poi School' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][school]', 
                'id' => 'poi-styles-school',
                'featureType' => 'poi.school'
            ),
            'Road Global' => array(
                'getOption' => get_option('road-styles'), 
                'name' => 'road-styles', 
                'id' => 'road-styles',
                'featureType' => 'road'
            ),
            'Road Arterial' => array(
                'getOption' => NULL,
                'name' => 'road-styles[subFeatureTypes][arterial]', 
                'id' => 'road-styles-arterial',
                'featureType' => 'road.arterial'
            ),
            'Road Highway' => array(
                'getOption' => NULL, 
                'name' => 'road-styles[subFeatureTypes][highway]', 
                'id' => 'road-styles-highway',
                'featureType' => 'road.highway'
            ),
            'Road Local' => array(
                'getOption' => NULL, 
                'name' => 'road-styles[subFeatureTypes][local]', 
                'id' => 'road-styles-local',
                'featureType' => 'road.local'
            ),
            'Transit Global' => array(
                'getOption' => get_option('transit-styles'), 
                'name' => 'transit-styles', 
                'id' => 'transit-styles',
                'featureType' => 'transit'
            ),
            'Transit Line' => array(
                'getOption' => NULL, 
                'name' => 'transit-styles[subFeatureTypes][line]', 
                'id' => 'transit-styles-line',
                'featureType' => 'transit.line'
            ),
            'Transit Station' => array(
                'getOption' => NULL, 
                'name' => 'transit-styles[subFeatureTypes][station]', 
                'id' => 'transit-styles-station',
                'featureType' => 'transit.station'
            ),
            'Water' => array(
                'getOption' => get_option('water-styles'), 
                'name' => 'water-styles', 
                'id' => 'water-styles',
                'featureType' => 'water'
            ),

        );
    }

    public function getArray() {

        if (is_array(get_option('landscape-styles')) && get_option('landscape-styles')['subFeatureTypes']['man_made']) : $this->conditionalOptionsArray['Landscape Man Made']['getOption'] = get_option('landscape-styles')['subFeatureTypes']['man_made'];
            else: $this->conditionalOptionsArray['Landscape Man Made']['getOption'] = NULL;
            endif;

        if (is_array(get_option('landscape-styles')) && get_option('landscape-styles')['subFeatureTypes']['natural']) : $this->conditionalOptionsArray['Landscape Natural']['getOption'] = get_option('landscape-styles')['subFeatureTypes']['natural'];
            else: $this->conditionalOptionsArray['Landscape Natural']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['attraction']) : $this->conditionalOptionsArray['Poi Attraction']['getOption'] = get_option('poi-styles')['subFeatureTypes']['attraction'];
            else: $this->conditionalOptionsArray['Poi Attraction']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['business']) : $this->conditionalOptionsArray['Poi Business']['getOption'] = get_option('poi-styles')['subFeatureTypes']['business'];
            else: $this->conditionalOptionsArray['Poi Business']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['government']) : $this->conditionalOptionsArray['Poi Government']['getOption'] = get_option('poi-styles')['subFeatureTypes']['government'];
            else: $this->conditionalOptionsArray['Poi Government']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['medical']) : $this->conditionalOptionsArray['Poi Medical']['getOption'] = get_option('poi-styles')['subFeatureTypes']['medical'];
            else: $this->conditionalOptionsArray['Poi Medical']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['park']) : $this->conditionalOptionsArray['Poi Park']['getOption'] = get_option('poi-styles')['subFeatureTypes']['park'];
            else: $this->conditionalOptionsArray['Poi Park']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['school']) : $this->conditionalOptionsArray['Poi School']['getOption'] = get_option('poi-styles')['subFeatureTypes']['school'];
            else: $this->conditionalOptionsArray['Poi School']['getOption'] = NULL;
            endif;

        if (is_array(get_option('road-styles')) && get_option('road-styles')['subFeatureTypes']['arterial']) : $this->conditionalOptionsArray['Road Arterial']['getOption'] = get_option('road-styles')['subFeatureTypes']['arterial'];
            else: $this->conditionalOptionsArray['Road Arterial']['getOption'] = NULL;
            endif;

        if (is_array(get_option('road-styles')) && get_option('road-styles')['subFeatureTypes']['highway']) : $this->conditionalOptionsArray['Road Highway']['getOption'] = get_option('road-styles')['subFeatureTypes']['highway'];
            else: $this->conditionalOptionsArray['Road Highway']['getOption'] = NULL;
            endif;

        if (is_array(get_option('road-styles')) && get_option('road-styles')['subFeatureTypes']['local']) : $this->conditionalOptionsArray['Road Local']['getOption'] = get_option('road-styles')['subFeatureTypes']['local'];
        else: $this->conditionalOptionsArray['Road Local']['getOption'] = NULL;
        endif;

        if (is_array(get_option('transit-styles')) && get_option('transit-styles')['subFeatureTypes']['line']) : $this->conditionalOptionsArray['Transit Line']['getOption'] = get_option('transit-styles')['subFeatureTypes']['line'];
            else: $this->conditionalOptionsArray['Transit Line']['getOption'] = NULL;
            endif;

        if (is_array(get_option('transit-styles')) && get_option('transit-styles')['subFeatureTypes']['station']) : $this->conditionalOptionsArray['Transit Station']['getOption'] = get_option('transit-styles')['subFeatureTypes']['station'];
            else: $this->conditionalOptionsArray['Transit Station']['getOption'] = NULL;
            endif;


        $array = $this->conditionalOptionsArray;
        return $array;
    }
}
