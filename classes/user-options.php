<?php

class UserOptions {

	public function getValues() {

		$valueArray = [
					"address" => get_option('address'),
					"api" => get_option('api-key'),
					"marker-image" => get_option('marker-image'),
				    "geometryColor" => get_option('geometry-color'),
				    'geometryStrokeColor' => get_option('geometry-stroke-color'),
					"labelsIconColor" => get_option('labels-icon-color'),
					"primaryTextColor" => get_option('primary-text-color'),
				    'primaryTextStrokeColor' => get_option('primary-text-stroke-color'),
					"poiColor" => get_option('poi-color'),
					"roadColor" => get_option('road-color'),
					"highwayColor" => get_option('highway-color'),
					"transitLineColor" => get_option('transit-line-color'),
					"transitStationColor" => get_option('transit-station-color'),
					"waterColor" => get_option('water-color')
				];

		return $valueArray;

    }

}


