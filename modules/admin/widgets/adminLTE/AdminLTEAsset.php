<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\widgets\adminLTE;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminLTEAsset extends AssetBundle
{
	public $sourcePath = '@vendor/almasaeed2010/adminlte';
	public $css = [
		'dist/css/AdminLTE.min.css',
		'plugins/datatables/dataTables.bootstrap.css',
//        '/f/css/admin.css',
	];
	public $js = [
		'dist/js/app.min.js',
		'plugins/datatables/jquery.dataTables.js',
		'plugins/datatables/dataTables.bootstrap.js',
	];
	public $depends = [
		'app\modules\admin\assets\FontAwesomeAsset',
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
//        'app\modules\admin\assets\BootboxAsset',
	];

	public $publishOptions = [
		'forceCopy' => true
	];

	/**
	 * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
	 */
	public $skin = 'skin-blue';

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		// Append skin color file if specified
//        if ($this->skin) {
//            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
//                throw new Exception('Invalid skin specified');
//            }
//
//            $this->css[] = sprintf('css/skins/%s.min.css', $this->skin);
		$this->css[] = 'dist/css/skins/_all-skins.min.css';
//        }

		parent::init();
	}
}
