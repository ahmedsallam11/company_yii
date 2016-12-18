<?php
use yii\widgets\DetailView;
use yii\helpers\Html

?>
 <p> <?= Html::a('Update', ['update', 'id' => $model->employeeID], ['class' => 'btn btn-primary']) ?>
     <?= Html::a('Delete', ['delete', 'id' => $model->employeeID], [
       'class' => 'btn btn-danger',
       'data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post', ],]) ?>
</p>
<?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'EmpFullName',                                           
            [
                'attribute' => 'salary',
                'format' => 'decimal'
            ],
            'department.departmentName',
            'superFullName'
        ],
    ]);