<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supervisors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supervisors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supervisors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employeeID',
            'fName',
            'lName',
            'salary',
    [ 'label' => 'department name','value' => 'departments.departmentName'],
//            'departmentID',
            // 'titleID',
            // 'supervisorID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
