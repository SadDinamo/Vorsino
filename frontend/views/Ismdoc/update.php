<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ismdoc */

$this->title = 'Update Ismdoc: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ismdocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ismdoc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
