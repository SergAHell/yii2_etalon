<?php

namespace app\modules\admin\controllers;

use yii;
use yii\web\Controller;
use app\modules\admin\base\BaseController;
use app\models\AuthUser;

class DefaultController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionError(){
        return $this->renderContent('404 Sorry! Page not found!');
    }
    
}
