<?php

namespace app\modules\admin\assets;
use yii\web\AssetBundle;
/**
 * Class FontAwesomeAsset
 */
class BootboxAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/bootbox';

    public $js = [
        'bootbox.js'
    ];

    public static function overrideSystemConfirm()
    {
        \Yii::$app->view->registerJs('
            yii.confirm = function(message, ok, cancel) {
                bootbox.addLocale("rus", {
                    OK : "ОК",
                    CANCEL : "Нет",
                    CONFIRM : "Да"
                });
                bootbox.setLocale("rus");
                bootbox.confirm(
                    {
                        message: message,
                        callback: function(result) {
                            if (result) { !ok || ok(); } else { !cancel || cancel(); }
                        }
                    }
                );
            }
        ');
    }
}