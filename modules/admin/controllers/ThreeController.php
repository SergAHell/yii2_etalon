<?php

namespace app\modules\admin\controllers;

use yii;
use yii\web\Controller;
use app\modules\admin\base\BaseController;
use app\models\AuthUser;

class ThreeController extends BaseController
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


}
