<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?php
      $permessiUtente = $model->getPermission($model->id)->all();
      $permessi = $model->getPermissionAll()->all();
      $userPermission= [];
      foreach ($permessiUtente as $value) {
        $userPermission [] = $value->item_name;
      }
      $allPermission =[];
      foreach ($permessi as $value) {
        $allPermission [] = $value->name;
      }

      $arrCreate=[];
      $arrUpdate=[];
      $arrDelete = [];
      foreach ($allPermission as $value) {
        if(strPos($value, 'create') !== false){
          //se contiene la parola create va a scrivere dentro appCreate;
          $arrCreate [] = $value;
        } else if (strPos($value, 'update') !== false){
          $arrUpdate [] = $value;
        } else if (strPos($value, 'delete') !== false){
          $arrDelete [] = $value;
        }
      }
      //foreach ($permessi as $value) {
      //  echo $value->name;
      //  foreach ($permessiUtente as $permesso) {
      //    echo $permesso->item_name;
      //  }
      //}

     ?>
     <h2>Permessi</h2>
     <h3>Creazione</h3>
     <?php foreach ($arrCreate as $value): ?>
          <p><input type="checkbox" name="SignupForm[permissions][]"
            <?php
              foreach ($userPermission as  $permesso) {
                if($permesso == $value){
                  echo 'checked';
                }
              }
            ?>
            ><?= $value ?></input></p>
     <?php endforeach; ?>
     <hr>
     <h3>Update</h3>
     <?php foreach ($arrUpdate as $value): ?>
       <p><input type="checkbox" name="SignupForm[permissions][]"
         <?php
           foreach ($userPermission as  $permesso) {
             if($permesso == $value){
               echo 'checked';
             }
           }
         ?>
         ><?= $value ?></input></p>
     <?php endforeach; ?>
     <hr>
     <h3>Delete</h3>
     <?php foreach ($arrDelete as $value): ?>
       <p><input type="checkbox" name="SignupForm[permissions][]"
         <?php
           foreach ($userPermission as  $permesso) {
             if($permesso == $value){
               echo 'checked';
             }
           }
         ?>
         ><?= $value ?></input></p>
     <?php endforeach; ?>
     <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
