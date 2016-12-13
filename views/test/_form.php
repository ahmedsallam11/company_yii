<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Departments;

/* @var $this yii\web\View */
/* @var $model app\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?= $form->field($model, 'titleID')->textInput() ?>

    <?= $form->field($model, 'supervisorID')->textInput() ?>
    <?= $form->field($model, 'departmentID')->dropDownList(
ArrayHelper::map(Departments::find()->all(),'departmentID','departmentName'),['prompt'=>'Select Department']) ?>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
