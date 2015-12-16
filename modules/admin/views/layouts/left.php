<?php
use yii\bootstrap\Nav;

?>
<aside class="main-sidebar">

	<section class="sidebar">
		<?php
		$user = Yii::$app->user->identity;
		//        $personTypes = \app\models\PersonType::getAllFoAdmin();
		$types = [];
		//        if ($personTypes) {
		//            $types[] = [
		//                'label' => 'Все',
		//                'url' => '/admin/person/index?clear',
		//                'icon' => 'fa-group',
		//                'active' => strpos(Yii::$app->request->url, '/admin/person/index')  === 0,
		//            ];
		////            $rules = $user->getAllRules();
		//            foreach ($personTypes as $tid => $title) {
		////                if ($user->isAdmin() || in_array($tid, $rules)) {
		//                    $types[] = [
		//                        'label' => $title,
		//                        'url' => '/admin/person/index?clear&PersonSearch[type_id]=' . $tid,
		//                        'icon' => 'fa-user',
		//                        'active' => strpos(Yii::$app->request->url, '/admin/person/')  === 0 && strpos(Yii::$app->request->url, 'PersonSearch[type_id]=' . $tid)  !== false,
		//                    ];
		////                }
		//            }
		//        }

		echo app\modules\admin\widgets\Menu::widget(
			[
				'options' => [
					'class' => 'sidebar-menu'
				],
				'items' => [
					[
						'label' => 'Персоны',
						'url' => '/admin/default/index?clear',
						'icon' => 'fa-group',
						'items' => $types,
						'active' => strpos(Yii::$app->request->url, '/admin/person/') === 0,
					],
					[
						'label' => 'Мероприятия',
						'url' => '/admin/event/index',
						'icon' => 'fa-calendar',
						'active' => strpos(Yii::$app->request->url, '/admin/event') === 0,
						'visible' => true, //$user->isAdmin(),
					],

					[
						'label' => 'Справочники',
						'url' => ['#'],
						'icon' => 'fa-calendar',
						'options' => [
							'class' => 'treeview',
						],
						'items' => [
							[
								'label' => 'Обращения',
								'url' => '/admin/appeal/index',
								'icon' => 'fa-comment',
								'active' => strpos(Yii::$app->request->url, '/admin/appeal') === 0
							],
							[
								'label' => 'Письма',
								'url' => '/admin/message/index',
								'icon' => 'fa-envelope-o',
								'active' => strpos(Yii::$app->request->url, '/admin/message') === 0
							],
							[
								'label' => 'Ключевые слова',
								'url' => '/admin/keyword/index',
								'icon' => 'fa-tags',
								'active' => strpos(Yii::$app->request->url, '/admin/keyword') === 0
							],
							[
								'label' => 'Персоны (типы)',
								'url' => '/admin/person-type/index',
								'icon' => 'fa-users',
								'active' => strpos(Yii::$app->request->url, '/admin/person-type') === 0
							],
							[
								'label' => 'Проекты',
								'url' => '/admin/project/index',
								'icon' => 'fa-server',
								'active' => strpos(Yii::$app->request->url, '/admin/project') === 0
							],
							[
								'label' => 'Регионы',
								'url' => '/admin/region/index',
								'icon' => 'fa-flag',
								'active' => strpos(Yii::$app->request->url, '/admin/region') === 0
							],
							[
								'label' => 'Голоса',
								'url' => '/admin/voice/index',
								'icon' => 'fa-microphone',
								'active' => strpos(Yii::$app->request->url, '/admin/voice') === 0
							],
						],
					],
					[
						'label' => 'Администраторы',
						'url' => '/admin/admin-users/index',
						'icon' => 'fa-user-secret',
						'active' => strpos(Yii::$app->request->url, '/admin/admin-users') === 0,
						'visible' => true, // $user->isAdmin(),
					],
				]
			]
		);
		?>
	</section>

</aside>
