<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departments;

/* @var $this yii\web\View */
/* @var $model app\models\Supervisors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supervisors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lName')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'salary')->textInput() ?>
    <?= $form->field($model, 'departmentID')->dropDownList(
ArrayHelper::map(Departments::find()->all(),'departmentID','departmentName')) ?>
   <?= Html::hiddenInput('titleID', 1)?>  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
