<?php

namespace app\components\adminLTE;

use yii;
use yii\base\Widget;

class AdminLTE extends Widget
{
	public $content = '';
	public $userName = '';
	public $isHeader = true;
	public $isLeft = true;
	public $isFooter = true;
	public $isSearch = false;
	public $isUserPanel = false;
	public $isRight = false;
	public $isCollapse = false;
	public $adminName = [
		'long' => '<span class="logo-lg"><b>Admin</b>LTE</span>',
		'short' => '<span class="logo-mini"><b>A</b>LT</span>',
	];
	public $menu = [];
	public $headDropDown = [];

	private $_isLeft;
	private $_isHeader;

	public function run($content = null)
	{
		if (!is_null($content)) {
			$this->content = $content;
		}

		$view = $this->getView();
		AdminLTEAsset::register($view);

		echo $this->render('main', [
			'content' => $this->content,
			'base' => $this,
			'userName' => '[' . $this->userName . ']',
			'leftMenu' => AdminLTEMenu::widget($this->menu),
		]);
	}

	public function login($authUser, $routeName)
	{
		if (!Yii::$app->user->isGuest) {
			return Yii::$app->getResponse()->redirect($routeName);
		}

		$this->_isHeader = $this->isHeader;
		$this->_isLeft = $this->isLeft;

		$model = $authUser;
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			$this->isHeader = $this->_isHeader;
			$this->isLeft = $this->_isLeft;
			return Yii::$app->getResponse()->redirect($routeName);
		}
		$this->isHeader = false;
		$this->isLeft = false;
		return $this->run($this->render('login', ['model' => $model,]));
	}

	public function addHeadDropDown($classIcon, $count, $classCount, $subRender)
	{
		$template = '<li class="dropdown messages-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa {classIcon}"></i>
						<span class="label label-{classCount}">{count}</span>
					</a>
					<ul class="dropdown-menu">{subRender}</ul>';
		$vals = [
			'{classIcon}' => $classIcon,
			'{count}' => $count,
			'{classCount}' => $classCount,
			'{subRender}' => $subRender,
		];
		$this->headDropDown[] = strtr($template, $vals);
	}


}
