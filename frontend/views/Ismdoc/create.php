<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ismdoc */

$this->title = 'Create Ismdoc';
$this->params['breadcrumbs'][] = ['label' => 'Ismdocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ismdoc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
