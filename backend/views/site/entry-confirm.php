<?php
use yii\helpers\Html;
 ?>

<p>Hai inserito le seguenti informazioni</p>
<ul>
  <li><label>Nome</label>: <?= Html::encode($model->nome) ?></li>
  <li><label>E-mail</label>: <?= Html::encode($model->email) ?></li>
</ul>
