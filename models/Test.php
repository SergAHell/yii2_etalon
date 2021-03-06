<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $name
 * @property integer $age
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    public static function displayName()
    {
        return 'Тест';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['age'], 'integer', 'max'=> 100 ],
            [['name'], 'string', 'max' => 255 ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'name' => 'Имя',
            'age' => 'Возраст',
        ];
    }
}
