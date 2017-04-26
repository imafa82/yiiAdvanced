<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id_city
 * @property string $ccode
 * @property string $name
 * @property integer $population
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ccode', 'name', 'population'], 'required'],
            [['population'], 'integer'],
            [['ccode'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_city' => Yii::t('app', 'Id City'),
            'ccode' => Yii::t('app', 'Ccode'),
            'name' => Yii::t('app', 'Name'),
            'population' => Yii::t('app', 'Population'),
        ];
    }
}
