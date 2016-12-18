<?php

namespace app\controllers;
use app\models\backUser;
use Yii;
class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    
        public function actionView()
    {
         $query = backUser::findOne(Yii::$app->user->getID());
         return $this->render('view', ['model' => $query]);
    }
}
