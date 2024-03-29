<?php

class UserOptions {

	public function getGeneralValues() {

		$valueArray = [
					"address" => get_option('address'),
					"api" => get_option('api-key'),
					"marker-styles" => get_option('marker-styles')
				];

		return $valueArray;

    }

    public function getStyleValues() {

		$valueArray = [
					"administrative-styles" => get_option('administrative-styles'),
					"landscape-styles" => get_option('landscape-styles'),
					"poi-styles" => get_option('poi-styles'),
					"road-styles" => get_option('road-styles'),
				    "transit-styles" => get_option('transit-styles'),
				    'water-styles' => get_option('water-styles')
				];

		return $valueArray;

    }

}


