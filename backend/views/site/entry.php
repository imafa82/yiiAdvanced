<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//inizio form
$form = ActiveForm::begin();

//campi
//Scrive a video un campo input type text, associando al campo della form la proprietà nome
echo $form->field($model, 'nome');

echo $form->field($model, 'email');
//pulsante submit

echo Html::submitButton('submit', ['class' => 'btn btn-primary']);

//fine form
ActiveForm::end();
?>
