<?php
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Html;
?>
<h1>Ordinary Employees</h1>
    <p>
        <?= Html::a('Add Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        
            'fName',
            'lName',
        [
            'attribute' => 'salary',
            'format' => 'decimal'
        ],
            'department.departmentName',
          
        [
            'class' => 'yii\grid\ActionColumn',
        ]    
]]);
?>