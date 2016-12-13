<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employeessearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employeeID') ?>

    <?= $form->field($model, 'fName') ?>

    <?= $form->field($model, 'lName') ?>

    <?= $form->field($model, 'salary') ?>

    <?= $form->field($model, 'departmentID') ?>

    <?php // echo $form->field($model, 'titleID') ?>

    <?php // echo $form->field($model, 'supervisorID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
