<?php

namespace app\modules\company\controllers;
use app\modules\company\models\Employees;
use yii\data\ActiveDataProvider;
use app\models\backUser;
use app\models\Rbac;
class SupervisorsController extends \yii\web\Controller
{
    public function beforeAction($action){
         return Rbac::userCan($this->action->id);
     }
    public function actionIndex()
    {
        
        $query = Employees::find()->where(['titleID'=>1]);
        $dataProvider = new ActiveDataProvider([
         'query' => $query,
         'pagination' => [
         'pageSize' => 8 ]]);
        //$dataProvider = $dataProvider->getModels();
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

}
