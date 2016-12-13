<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\filters\AccessControl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Employeessearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

       if (\Yii::$app->user->can('index')) {
    echo "yes it is pending.";
} else {
    echo "nothing";
}

?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employees', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'employeeID',
            'fName',
            'lName',
     'salary',
 [ 'label' => 'department name','value' => 'departments.departmentName'],
 [ 'label' => 'Titles','value' => 'titles.titleName'],    
           
            //'departmentID',
            // 'titleID',
            // 'supervisorID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
