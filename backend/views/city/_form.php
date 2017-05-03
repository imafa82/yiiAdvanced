<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>
    <?PHP
      if(isset ($ccode) && $ccode != null){
        echo $form->field($model, 'ccode')->
        dropDownList(ArrayHelper::map(Country::find()->
        orderBy('name')->all(), 'code', 'name'));

      }else{
        echo $form->field($model, 'ccode')->textInput(['maxlength' => true]);
      }
    ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'population')->textInput() ?>

    <?= $form->field($model, 'birthdate')->widget(
       DatePicker::className(), [
            'inline' => false,
             'clientOptions' => [
                 'autoclose' => true,
                 'format' => 'yyyy-m-d'
             ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
