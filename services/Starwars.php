<?php

namespace app\services;

/**
 * StarwarsLibrary responsible for Starwars services
 *
 * @author Arfeen
 */
class Starwars {
      /**
     * api to fetch film having longest open crawl
     * @return string
     */
    public function GetLongestCrawl(){
        return ['status' => false];
    }
    
    /**
     * api to fetch the most appeared starwars character
     * @return string
     */
    public function GetMostAppearedCharacter(){
        return ['status' => false];
    }
    
    /**
     * api to fetch the most appeared species
     * @return string
     */
    public function GetMostAppearedSpecies(){
        return ['status' => false];
    }
 
    /**
     * api to fetch largest number of vehicle
     * @return string 
    */
    public function GetPlanetWithLargestNumberOfVehicles(){
       return ['status' => false]; 
    }
}
