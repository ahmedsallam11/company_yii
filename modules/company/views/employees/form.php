<?php
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\company\models\Departments;
use app\modules\company\models\Employees;
use yii\helpers\Html;


$form = ActiveForm::begin([
    'id' => 'employee-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<?= $form->field($model, 'fName')->input('text')->label('First name') ?>
<?= $form->field($model, 'lName')->input('text')->label('Last name') ?>
<?= $form->field($model, 'salary')->input('number')->label('Salary') ?>
<?= $form->field($model,'departmentID')->dropDownList(
ArrayHelper::map(Departments::find()->all(),'departmentID','departmentName'))->label('Department') ?>
<?= $form->field($model,'supervisorID')->dropDownList(
ArrayHelper::map(Employees::find()->where(['titleID'=>1])->all(),'employeeID','fName'))->label('Supervisor') ?>

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   </div>

<?php ActiveForm::end() ?>