<?php

namespace app\modules\admin\assets;
use yii\web\AssetBundle;
/**
 * Class FontAwesomeAsset
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/components/font-awesome';

    public $css = [
        'css/font-awesome.min.css',
    ];

    public $publishOptions = [
//        'forceCopy' => true,
    ];

    public function init()
    {
        parent::init();

        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return strpos($from, 'fonts') !== false || strpos($from, 'css') !== false;
        };
    }
}