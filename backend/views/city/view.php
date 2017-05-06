<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use app\models\Country;
/* @var $this yii\web\View */
/* @var $model app\models\City */
//$country = new Country();


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_city], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_city], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

        <?php if($model && $model->allegato && file_exists($model->allegato)){
          ?>
          <img  style="width:150px;" src="<?= $model->allegato ?>" alt="" title="" />
          <?php
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_city',
            //'ccode',
            /*[
              'attribute' => 'ccode',
              'label' =>Yii::t('app', 'Nazione d\'origine'),
              'value' => $country->getCountryFromCity($model->ccode),
            ],*/
            [
              'attribute' => 'ccode',
              'label' =>Yii::t('app', 'Nazione d\'origine'),
              'value' => $model->getNazione()->one()['name'],
              ],
            'name',
            'population',
            'birthdate',
            'allegato'
        ],
    ]) ?>
    <?php if($model && $model->allegato && file_exists($model->allegato)){
      echo Html::a(Yii::t('app', 'Scarica Allegato'),
    ['scarica', 'id' => $model->id_city, 'allegato' => $model->allegato],
    ['class' => 'btn btn-primary']);
      ?>


    <a download class="btn btn-default"
     href="<?PHP echo $model->allegato; ?>">
     <i class="glyphicon glyphicon-eye-open"></i>
     <?=Yii::t('app', 'Scarica Allegato')?></a>
     <?php } ?>
</div>
