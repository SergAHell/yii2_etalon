<?php

namespace app\modules\admin;

class Admin extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public $layout = 'main.php';

    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
