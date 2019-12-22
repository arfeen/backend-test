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
    public function GetLongestCrawl() {
        return ['status' => false];
    }

    /**
     * api to fetch the most appeared starwars character
     * @return string
     */
    public function GetMostAppearedCharacter() {
        $collection = \Yii::$app->mongodb->getCollection('people');
        $query = [
            ['$lookup' => [
                    'from' => "films",
                    'let' => ['id' => '$id'],
                    'pipeline' => [
                        [
                            '$match' => [
                                '$expr' => [
                                    '$in' => [
                                        '$$id',
                                        '$characters'
                                    ]
                                ]
                            ]
                        ],
                        [
                            '$project' => [
                                'count' => 1
                            ]
                        ],
                        [
                            '$count' => 'title'
                        ],
                        [
                            '$group' => [
                                '_id' => '$title',
                                'appearance_count' => [
                                    '$sum' => '$title'
                                ]
                            ]
                        ],
                        [
                            '$sort' => [
                                'appearance_count' => -1
                            ]
                        ]
                    ],
                    'as' => 'films_recordset'
                ]
            ],
            [
                '$sort' => [
                    'films_recordset.appearance_count' => -1
                ]
            ],
            [
                '$project' => [
                    'name' => 1
                ]
            ],
            [
                '$limit' => 1
            ]
        ];
        $result = $collection->aggregate($query);
        return $result;
    }

    /**
     * api to fetch the most appeared species
     * @return string
     */
    public function GetMostAppearedSpecies() {
        return ['status' => false];
    }

    /**
     * api to fetch largest number of vehicle
     * @return string 
     */
    public function GetPlanetWithLargestNumberOfVehicles() {
        return ['status' => false];
    }

}
