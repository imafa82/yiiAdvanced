<?php

namespace app\models;

use Yii;
use app\models\city;
/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['population'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'population' => Yii::t('app', 'Population'),
        ];
    }

    public function getNazioniCount(){

        $sql="Select count(code) as conteggio from country";
        //esegui la query
        $db = Yii::$app->db;
        $n_nazioni = $db->createCommand($sql)->queryOne()['conteggio'];
        return $n_nazioni;

    }

    public function getCittaCount(){

        $n_citta = City::find()->count();
        return $n_citta;

    }

    public function getCountryFromCity($ccode){

      $sql="Select name from country where code='$ccode'";
      $db = Yii::$app->db;
      $nazione = $db->createCommand($sql)->queryOne()['name'];
      return $nazione;

  }
}
