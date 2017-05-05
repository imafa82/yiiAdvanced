<?php
use yii\helpers\Html;

$this->title = 'Statistiche';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>
</div>
<p>
  Questa è la pagina delle Statistiche
</p>
<button class="btn btn-primary" type="button">
  N° Nazioni <span class="badge"> <?= $n_nazioni ?></span>
</button>
<button class="btn btn-primary" type="button">
  N° Città <span class="badge"> <?= $n_citta ?></span>
</button>
<table class="table table-striped">
  <tr>
    <th>
      N°
    </th>
    <th>
      Nazione
    </th>
  </tr>
<?php
  foreach ($count as $key => $value) {?>


      <tr>
        <td>
          <?= $value['conteggio'] ?>
        </td>
        <td>
          <?= $value['name'] ?>
        </td>
      </tr>

    <?php
  }


 ?>
</table>
