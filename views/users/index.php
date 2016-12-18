<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'userID',
            'username',
            'email:email',
    [ 'label' => 'Role','value' => 'role.name'],
    [ 'label' => 'Status','value' => 'status.status'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
Contact GitHub API Training Shop Blog About
