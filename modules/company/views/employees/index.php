<?php
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Rbac;
?>
<h1>Ordinary Employees</h1>

    <?php if (Yii::$app->session->hasFlash('warning')): ?>
    <div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?= Yii::$app->session->getFlash('warning') ?>
    </div>
    <?php endif; ?>

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
            'superFullName', 
          
        [
            'class' => 'yii\grid\ActionColumn',
        ]    
]]);
        

?>