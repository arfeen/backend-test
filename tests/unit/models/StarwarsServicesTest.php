<?php

namespace tests\unit\models;

use app\services\Starwars;
use app\models\Films;

/**
 * Service tes
 *
 * @author Arfeen
 */
class StarwarsServicesTest extends \Codeception\Test\Unit {

    /**
     * Test for checking DB connectivity for a simple query
     */
    public function testCheckAnyDBModel() {
        $total = \Yii::$app->mongodb->getCollection('films')->count();
        expect_that($total > 0);
    }

}
