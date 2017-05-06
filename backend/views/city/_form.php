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

    <?php $form = ActiveForm::begin(
      ['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?PHP
      if(isset ($ccode) && $ccode != null){
        $model->ccode = $ccode;
        echo $form->field($model, 'ccode')->
        dropDownList(ArrayHelper::map(Country::find()->
        orderBy('name')->all(), 'code', 'name'));

      }else{
        echo $form->field($model, 'ccode')->
        dropDownList(ArrayHelper::map(Country::find()->
        orderBy('name')->all(), 'code', 'name'));
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
    <?= $form->field($model, 'file')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php if($model && $model->allegato){
      ?>
      <img  style="width:150px;" src="<?= $model->allegato ?>" alt="" title="" />
      <?php
    } ?>
    <?php ActiveForm::end(); ?>

</div>
