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

    /**
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect('index');
        }

        $model = new AuthUser();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return Yii::$app->getResponse()->redirect('index');
            //return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

}
