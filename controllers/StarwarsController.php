<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\services\Starwars;

/**
 * class responsible for REST API controller
 * @author Muhammad Arfeen <arfeenster@gmail.com>
 * 
 */
class StarwarsController extends Controller {

    /**
     * an api that checks sanity of web server 
     * and framework
     * 
     * 
     * @return string
     */
    public function actionGetapistatus() {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['status' => true];
    }


    public function actionGetlongestcrawl() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = ['success' => false];
        $service = new Starwars();
        $titleInfo = $service->GetLongestCrawl();
        if (count($titleInfo)) {
            $response['success'] = true;
            $response['title'] = $titleInfo[0]['title'];
            return $response;
        }
        return $response;
    }

    /**
     * api action to fetch most appeared character
     *  
     * @return string
     */
    public function actionGetlongestcrawl() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $response = ['success' => false];
        $service = new Starwars();
        $titleInfo = $service->GetMostAppearedCharacter();
        if (count($titleInfo)) {
            $response['success'] = true;
            $response['name'] = $titleInfo[0]['name'];
            return $response;
        }
        return $response;
    }

    /**
     * error handler
     * @return string
     */
    public function actionError() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $exception = Yii::$app->errorHandler->exception;
        $response['message'] = $exception->getMessage();
        $response['error'] = $exception;
        return $response;
    }

}
