<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Preferencies */

$this->title = 'Create Preferencies';
$this->params['breadcrumbs'][] = ['label' => 'Preferencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preferencies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
