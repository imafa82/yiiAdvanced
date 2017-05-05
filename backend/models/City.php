<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "city".
 *
 * @property integer $id_city
 * @property string $ccode
 * @property string $name
 * @property integer $population
 * @property string $birthdate
 * @property string $allegato
 */
class City extends \yii\db\ActiveRecord
{
  public $file; //proprietà per gestire l'upload del file

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
            [['ccode', 'name', 'population', 'birthdate', 'allegato'], 'required'],
            [['population'], 'integer'],
            [['ccode'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 50],
            [['birthdate'], 'string'],
            [['allegato'], 'string', 'max' => 100],
            [['file'], 'file'],
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
            'birthdate' => Yii::t('app', 'Birth Date'),
            'allegato' => Yii::t('app', 'Allegato'),
        ];
    }
    public function getNazione()
      {
          return $this->hasOne(Country::className(),
          ['code' => 'ccode']);
      }

    public function countCityforCountry(){

          $sql="Select * from numerocittapernazione";
          $db = Yii::$app->db;
          $conteggio = $db->createCommand($sql)->queryAll();
          //matrice di array assocciativi
          return $conteggio;

      }

}
