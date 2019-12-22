<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
        //print_r($_SERVER);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['status' => true];
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
