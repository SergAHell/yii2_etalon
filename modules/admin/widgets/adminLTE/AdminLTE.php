<?php

namespace app\modules\admin\widgets\adminLTE;

use yii;
use yii\base\Widget;

class AdminLTE extends Widget
{
	public $content = '';
	public $userName = '';
	public $isHeader = true;
	public $isFooter = true;
	public $menu = [];
	public $isSearch = false;
	public $isUserPanel = false;
	public $isRight = false;
	public $isCollapsed = false;
	public $adminName = [
		'long' => '<span class="logo-lg"><b>Admin</b>LTE</span>',
		'short' => '<span class="logo-mini"><b>A</b>LT</span>',
	];
	public $headDropDown = [];

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

		$model = $authUser;
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return Yii::$app->getResponse()->redirect($routeName);
		}
		echo $this->run($this->render('login', ['model' => $model,]));
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
