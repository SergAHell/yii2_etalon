<?php

namespace app\modules\admin\base;

use yii;
use yii\web\Controller;
use app\models\AuthUser;
use app\components\adminLTE\AdminLTE;
use yii\helpers\Url;

class BaseController extends Controller
{
	public $layout = 'altmain';

	/** @var  AdminLTE */
	public $admin;
	
	public function init()
	{
		if (strpos(Yii::$app->request->url, 'logout') > 0){
			Yii::$app->user->logout();
			return $this->goHome();
		}

		$this->admin = Yii::$app->get('adminLTE');

//		if (Yii::$app->user->isGuest) {
//			$this->admin->login(new AuthUser(), Yii::$app->request->url);
//			return false;
//		}

		$this->makeMenu();
		$this->makeHeadDropDown();
		parent::init(); 
	}

	public function makeMenu(){
		$this->admin->menu = [
			'options' => [
				'class' => 'sidebar-menu'
			],
			'items' => [
				[
					'label' => 'city',
					'url' => '/admin/city',
					'icon' => 'fa-rss',
					'active' => strpos(Yii::$app->request->url, '/admin/city') === 0,
				],
				[
					'label' => 'test',
					'url' => '/admin/test',
					'icon' => 'fa-rss',
					'active' => strpos(Yii::$app->request->url, '/admin/test') === 0,
				],
			],
		];
	}

	public function makeHeadDropDown()
	{
		$this->admin->addHeadDropDown('fa-flag-o', 10, 'warning', '<h2>aaaaaaaaaa</h2>');
		$this->admin->addHeadDropDown('fa-bell-o', 3, 'success', '<h1>bbbbbbbbbbb</h1>');
		$this->admin->addHeadDropDown('fa-bell-o', 6, 'info', '<h1>ccccccccccc</h1>');
		$this->admin->addHeadDropDown('fa-bell-o', 8, 'error', '<h1>ccccccccccc</h1>');
	}

	public function getModel(){
		$name = '\app\models\\' . $this->modelName;
		return new $name();
	}

	public function getModelSearch(){
		$name = '\app\models\\' . $this->modelName . 'Search';
		return new $name();
	}


	public function beforeAction($action)
	{
		if (Yii::$app->user->isGuest) {
			$this->admin->login(new AuthUser(), Yii::$app->request->url);
			return false;
		}
		return parent::beforeAction($action); // TODO: Change the autogenerated stub
	}

	public function actionIndex(){
		$searchModel = $this->getModelSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination->pageSize = 10;

		return $this->render('../layouts/index', [
			'searchModel' => $searchModel,
			'searchPanel' => $this->render('_search', ['model' => $searchModel]),
			'dataProvider' => $dataProvider,
			'model' => $this->getModel(),
		]);

	}

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Displays a single City model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new City model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = $this->getModel();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			//return $this->redirect(['view', 'id' => $model->id]);
			return $this->redirect(['index']);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing City model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			//return $this->redirect(['view', 'id' => $model->id]);
			return $this->redirect(['index']);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Finds the City model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return City the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		$model = $this->getModel();
		if (($model = $model::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	
	
	
}
