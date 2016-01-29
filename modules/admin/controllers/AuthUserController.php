<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\AuthUser;
use app\models\AuthUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\base\BaseController;
use yii\web\UploadedFile;

/**
 * AuthUserController implements the CRUD actions for AuthUser model.
 */
class AuthUserController extends BaseController
{
    public $modelName = 'AuthUser';


//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all AuthUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->getModel(),
        ]);
    }

//    /**
//     * Displays a single AuthUser model.
//     *
//     * @param integer $id
//     *
//     * @return mixed
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

//    /**
//     * Finds the AuthUser model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     *
//     * @param integer $id
//     *
//     * @return AuthUser the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if ( ( $model = AuthUser::findOne($id) ) !== null ) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }

    public function saveAvatar($model){
        /** @var UploadedFile $file */
        $file = UploadedFile::getInstance($model, 'avatar');
        var_dump($model);
        var_dump($file);
      die();

        if (is_null($file) || empty($file->name)) {
            /** @var Avatar avatar */
            $model->avatar = isset($model->getOldAttributes()['avatar']) ? $model->getOldAttributes()['avatar'] : null;
            return true;
        }
        $base = Yii::$app->basePath . '/web';
        $path = '/uploads/';
        $name = $file->name;
        $model->avatar = $path.$name;
        $file->saveAs($base . $path . $name);
        return true;
    }

    /**
     * Creates a new AuthUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthUser();

        if ( $model->load(Yii::$app->request->post()) && $model->validate() && $this->saveAvatar($model) && $model->save() ) {
            //$this->saveAvatar($model);
//            $file = UploadedFile::getInstance($model, 'avatar');
//            var_dump($file);
            //$model->avatar =

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ( $model->load(Yii::$app->request->post()) && $model->validate() && $this->saveAvatar($model) && $model->save() ) {
//            $this->saveAvatar($model);
//            $file = UploadedFile::getInstance($model, 'avatar');
//            var_dump($file);
//            var_dump($model);
//            var_dump($_FILES);
//            //$model->avatar->saveAs(Yii::$app->basePath . '/uploads/' . $model->avatar);
//            die();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

//    /**
//     * Deletes an existing AuthUser model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     *
//     * @param integer $id
//     *
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
}
