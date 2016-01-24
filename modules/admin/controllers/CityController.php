<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\City;
use app\models\CitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\base\BaseController;

class CityController extends BaseController
{
    public $layout = 'altmain';
    
    public $modelName = 'City';
    
    
}
