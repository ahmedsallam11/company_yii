<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
    'id'=>'signup',
    'options'=>['class'=>'form-horizontal']
]);
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6 ">
<?= $form->field($model,'username')?>
<?= $form->field($model,'email')?>
<?= $form->field($model,'password')->passwordInput()?>
<?= $form->field($model,'password_again')->passwordInput()?>
</div>
    <div class="form-group">
        <div class="col-lg-10">
            <?= Html::submitButton('Signup', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>