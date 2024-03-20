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
            'Administrative Country' => array(
                'getOption' => NULL, 
                'name' => 'administrative-styles[subFeatureTypes][country]', 
                'id' => 'administrative-styles-country',
                'featureType' => 'administrative.country'
            ),
            'Administrative Land Parcel' => array(
                'getOption' => NULL, 
                'name' => 'administrative-styles[subFeatureTypes][land-parcel]', 
                'id' => 'administrative-styles-land-parcel',
                'featureType' => 'administrative.land_parcel'
            ),
            'Administrative Locality' => array(
                'getOption' => NULL, 
                'name' => 'administrative-styles[subFeatureTypes][locality]', 
                'id' => 'administrative-styles-locality',
                'featureType' => 'administrative.locality'
            ),
            'Administrative Neighborhood' => array(
                'getOption' => NULL, 
                'name' => 'administrative-styles[subFeatureTypes][neighborhood]', 
                'id' => 'administrative-styles-neighborhood',
                'featureType' => 'administrative.neighborhood'
            ),
            'Administrative Province' => array(
                'getOption' => NULL, 
                'name' => 'administrative-styles[subFeatureTypes][province]', 
                'id' => 'administrative-styles-province',
                'featureType' => 'administrative.province'
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
            'Landscape Natural Landcover' => array(
                'getOption' => NULL, 
                'name' => 'landscape-styles[subFeatureTypes][natural][subFeatureTypes][landcover]', 
                'id' => 'landscape-styles-natural-landcover',
                'featureType' => 'landscape.natural.landcover'
            ),
            'Landscape Natural Terrain' => array(
                'getOption' => NULL, 
                'name' => 'landscape-styles[subFeatureTypes][natural][subFeatureTypes][terrain]', 
                'id' => 'landscape-styles-natural-terrain',
                'featureType' => 'landscape.natural.terrain'
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
            'Poi Place Of Worship' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][place_of_worship]', 
                'id' => 'poi-styles-place_of_worship',
                'featureType' => 'poi.place_of_worship'
            ),
            'Poi School' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][school]', 
                'id' => 'poi-styles-school',
                'featureType' => 'poi.school'
            ),
            'Poi Sports Complex' => array(
                'getOption' => NULL, 
                'name' => 'poi-styles[subFeatureTypes][sports_complex]', 
                'id' => 'poi-sports_complex',
                'featureType' => 'poi.sports_complex'
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
            'Road Highway Controlled Access' => array(
                'getOption' => NULL, 
                'name' => 'road-styles[subFeatureTypes][highway][subFeatureTypes][controlled_access]', 
                'id' => 'road-styles-highway-controlled_access',
                'featureType' => 'road.highway.controlled_access'
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
            'Transit Station Airport' => array(
                'getOption' => NULL, 
                'name' => 'transit-styles[subFeatureTypes][station][subFeatureTypes][airport]', 
                'id' => 'transit-styles-station-airport',
                'featureType' => 'transit.station.airport'
            ),
            'Transit Station Bus' => array(
                'getOption' => NULL, 
                'name' => 'transit-styles[subFeatureTypes][station][subFeatureTypes][bus]', 
                'id' => 'transit-styles-station-bus',
                'featureType' => 'transit',
                'featureType' => 'transit.station.bus'
            ),
            'Transit Station Rail' => array(
                'getOption' => NULL, 
                'name' => 'transit-styles[subFeatureTypes][station][subFeatureTypes][rail]', 
                'id' => 'transit-styles-station-rail',
                'featureType' => 'transit.station.rail'
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

        if (is_array(get_option('administrative-styles')) && get_option('administrative-styles')['subFeatureTypes']['country']) : $this->conditionalOptionsArray['Administrative Country']['getOption'] = get_option('administrative-styles')['subFeatureTypes']['country'];
            else: $this->conditionalOptionsArray['Administrative Country']['getOption'] = NULL;
            endif;

        if (is_array(get_option('administrative-styles')) && get_option('administrative-styles')['subFeatureTypes']['land-parcel']) : $this->conditionalOptionsArray['Administrative Land Parcel']['getOption'] = get_option('administrative-styles')['subFeatureTypes']['land-parcel'];
            else: $this->conditionalOptionsArray['Administrative Land Parcel']['getOption'] = NULL;
            endif;

        if (is_array(get_option('administrative-styles')) && get_option('administrative-styles')['subFeatureTypes']['locality']) : $this->conditionalOptionsArray['Administrative Locality']['getOption'] = get_option('administrative-styles')['subFeatureTypes']['locality'];
            else: $this->conditionalOptionsArray['Administrative Locality']['getOption'] = NULL;
            endif;

        if (is_array(get_option('administrative-styles')) && get_option('administrative-styles')['subFeatureTypes']['neighborhood']) : $this->conditionalOptionsArray['Administrative Neighborhood']['getOption'] = get_option('administrative-styles')['subFeatureTypes']['neighborhood'];
            else: $this->conditionalOptionsArray['Administrative Neighborhood']['getOption'] = NULL;
            endif;

        if (is_array(get_option('administrative-styles')) && get_option('administrative-styles')['subFeatureTypes']['province']) : $this->conditionalOptionsArray['Administrative Province']['getOption'] = get_option('administrative-styles')['subFeatureTypes']['province'];
            else: $this->conditionalOptionsArray['Administrative Province']['getOption'] = NULL;
            endif;

        if (is_array(get_option('landscape-styles')) && get_option('landscape-styles')['subFeatureTypes']['man_made']) : $this->conditionalOptionsArray['Landscape Man Made']['getOption'] = get_option('landscape-styles')['subFeatureTypes']['man_made'];
            else: $this->conditionalOptionsArray['Landscape Man Made']['getOption'] = NULL;
            endif;

        if (is_array(get_option('landscape-styles')) && get_option('landscape-styles')['subFeatureTypes']['natural']) : $this->conditionalOptionsArray['Landscape Natural']['getOption'] = get_option('landscape-styles')['subFeatureTypes']['natural'];
            else: $this->conditionalOptionsArray['Landscape Natural']['getOption'] = NULL;
            endif;

        if (is_array(get_option('landscape-styles')) && get_option('landscape-styles')['subFeatureTypes']['natural']['subFeatureTypes']['landcover']) : $this->conditionalOptionsArray['Landscape Natural Landcover']['getOption'] = get_option('landscape-styles')['subFeatureTypes']['natural']['subFeatureTypes']['landcover'];
            else: $this->conditionalOptionsArray['Landscape Natural Landcover']['getOption'] = NULL;
            endif;

        if (is_array(get_option('landscape-styles')) && get_option('landscape-styles')['subFeatureTypes']['natural']['subFeatureTypes']['terrain']) : $this->conditionalOptionsArray['Landscape Natural Terrain']['getOption'] = get_option('landscape-styles')['subFeatureTypes']['natural']['subFeatureTypes']['terrain'];
            else: $this->conditionalOptionsArray['Landscape Natural Terrain']['getOption'] = NULL;
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

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['place_of_worship']) : $this->conditionalOptionsArray['Poi Place Of Worship']['getOption'] = get_option('poi-styles')['subFeatureTypes']['place_of_worship'];
            else: $this->conditionalOptionsArray['Poi Place Of Worship']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['school']) : $this->conditionalOptionsArray['Poi School']['getOption'] = get_option('poi-styles')['subFeatureTypes']['school'];
            else: $this->conditionalOptionsArray['Poi School']['getOption'] = NULL;
            endif;

        if (is_array(get_option('poi-styles')) && get_option('poi-styles')['subFeatureTypes']['sports_complex']) : $this->conditionalOptionsArray['Poi Sports Complex']['getOption'] = get_option('poi-styles')['subFeatureTypes']['sports_complex'];
            else: $this->conditionalOptionsArray['Poi Sports Complex']['getOption'] = NULL;
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

        if (is_array(get_option('road-styles')) && get_option('road-styles')['subFeatureTypes']['highway']['subFeatureTypes']['controlled_access']) : $this->conditionalOptionsArray['Road Highway Controlled Access']['getOption'] = get_option('road-styles')['subFeatureTypes']['highway']['subFeatureTypes']['controlled_access'];
            else: $this->conditionalOptionsArray['Road Highway Controlled Access']['getOption'] = NULL;
            endif;

        if (is_array(get_option('transit-styles')) && get_option('transit-styles')['subFeatureTypes']['line']) : $this->conditionalOptionsArray['Transit Line']['getOption'] = get_option('transit-styles')['subFeatureTypes']['line'];
            else: $this->conditionalOptionsArray['Transit Line']['getOption'] = NULL;
            endif;

        if (is_array(get_option('transit-styles')) && get_option('transit-styles')['subFeatureTypes']['station']) : $this->conditionalOptionsArray['Transit Station']['getOption'] = get_option('transit-styles')['subFeatureTypes']['station'];
            else: $this->conditionalOptionsArray['Transit Station']['getOption'] = NULL;
            endif;

        if (is_array(get_option('transit-styles')) && get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['airport']) : $this->conditionalOptionsArray['Transit Station Airport']['getOption'] = get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['airport'];
            else: $this->conditionalOptionsArray['Transit Station Airport']['getOption'] = NULL;
            endif;

        if (is_array(get_option('transit-styles')) && get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['bus']) : $this->conditionalOptionsArray['Transit Station Bus']['getOption'] = get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['bus'];
            else: $this->conditionalOptionsArray['Transit Station Bus']['getOption'] = NULL;
            endif;

        if (is_array(get_option('transit-styles')) && get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['rail']) : $this->conditionalOptionsArray['Transit Station Rail']['getOption'] = get_option('transit-styles')['subFeatureTypes']['station']['subFeatureTypes']['rail'];
            else: $this->conditionalOptionsArray['Transit Station Rail']['getOption'] = NULL;
            endif;

        $array = $this->conditionalOptionsArray;
        return $array;
    }
}
