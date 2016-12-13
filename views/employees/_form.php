<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Departments;
use app\models\Titles;
use app\models\Supervisors;
/* @var $this yii\web\View */
/* @var $model app\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?= $form->field($model,'departmentID')->dropDownList(
ArrayHelper::map(Departments::find()->all(),'departmentID','departmentName')) ?>

        <?= $form->field($model, 'titleID')->dropDownList(
ArrayHelper::map(Titles::find()->all(),'titleID','titleName')) ?>

        <?= $form->field($model, 'supervisorID')->dropDownList(
ArrayHelper::map(Supervisors::find()->all(),'supervisorID','fName')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
