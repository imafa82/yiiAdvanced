<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model {
  //proprietà
  public $nome;
  public $email;


  //metodi -- trattandosi di una form devo utilizzare le rules

    public function rules(){
      return [
        [['nome', 'email'], 'required'],
        ['email','email'],
      ];
    }

}
