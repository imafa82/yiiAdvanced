<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = Yii::t('app', 'Create City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(isset($ccode) && $ccode != null){
      echo $this->render('_form', [
          'model' => $model,
          'ccode' => $ccode
      ]);
    } else {
      echo $this->render('_form', [
          'model' => $model
      ]);
    } ?>


</div>
