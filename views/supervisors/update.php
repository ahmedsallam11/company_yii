<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Supervisors */

$this->title = 'Update Supervisors: ' . $model->employeeID;
$this->params['breadcrumbs'][] = ['label' => 'Supervisors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employeeID, 'url' => ['view', 'id' => $model->employeeID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supervisors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
