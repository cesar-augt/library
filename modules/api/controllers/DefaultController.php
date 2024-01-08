<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = 'app\models\Book';

    public function beforeAction($action)
    {
        //$this->enableCsrfValidation = false; // Desativar validação CSRF para exemplo

        if (in_array($action->id, ['create',  'update'])) {
            \Yii::$app->request->parsers = [
                'application/json' => 'yii\web\JsonParser',
            ];
        }

        return parent::beforeAction($action);
    }
}
