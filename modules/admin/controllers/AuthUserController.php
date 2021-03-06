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

	public function saveAvatar(AuthUser $model)
	{
		/** @var UploadedFile $file */
		$file = UploadedFile::getInstance($model, 'avatar');
		if (is_null($file) || empty($file->name)) {
			$model->setAvatar(isset($model->getOldAttributes()['avatar']) ? $model->getOldAttributes()['avatar'] : null);
			$post = Yii::$app->request->post()['AuthUser'];
			$model->setAvatar(isset($post['deleteAvatar']) && $post['deleteAvatar'] ? null : $model->getAvatar() );
			return true;
		}
		$base = Yii::$app->basePath . '/web';
		$name = '/uploads/' . $file->name;
		$model->setAvatar($name);
		$file->saveAs($base . $name);
		return true;
	}

	/**
	 * Creates a new AuthUser model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		/** @var AuthUser $model */
		$model = new AuthUser();

		return $model->load(Yii::$app->request->post()) && $model->validate() && $this->saveAvatar($model) && $model->save() ?
			$this->redirect(['index']) :
			$this->render('create', ['model' => $model,]);
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
		/** @var AuthUser $model */
		$model = $this->findModel($id);

		return $model->load(Yii::$app->request->post()) && $model->validate() && $this->saveAvatar($model) && $model->save() ?
			$this->redirect(['index']) :
			$this->render('update', ['model' => $model,]);
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
