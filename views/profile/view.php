<?php
use yii\widgets\DetailView;
use yii\helpers\Html

?>
 <p> <?= Html::a('Update', ['update', 'id' => Yii::$app->user->getID()], ['class' => 'btn btn-primary']) ?>

</p>
<?php if (Yii::$app->session->hasFlash('warning')): ?>
<div class="alert alert-warning alert-dismissable">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<?= Yii::$app->session->getFlash('warning') ?>
</div>
<?php endif; ?>
<?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
        'username',
        'email:email',
         [                    
            'label' => 'Status',
            'value' => $model->status->status,
         ],
                  [                    
            'label' => 'Role',
            'value' => $model->role->name,
        ],
        ],
    ]);