<?php

namespace app\modules\company\controllers;
use app\modules\company\models\Employees;
use yii\data\ActiveDataProvider;   
use app\models\backUser;
use app\models\Rbac;
use yii;
class EmployeesController extends \yii\web\Controller
{
    
     public function beforeAction($action){
         return Rbac::userCan($this->action->id);
     }

    public function actions(){
     return ['error' => ['class' => 'yii\web\ErrorAction', ]];
    }
    
    public function actionIndex(){
        $query = Employees::find()->where(['titleID'=>2]);
        $dataProvider = new ActiveDataProvider([
         'query' => $query,
         'pagination' => [
         'pageSize' => 8 ]]);
        //$dataProvider = $dataProvider->getModels();
        return $this->render('index',['dataProvider'=>$dataProvider]);}
 
    public function actionView($id){
        $query = Employees::findOne($id);
         return $this->render('view', ['model' => $query]); }
    
    

    public function actionUpdate($id){
        $query = Employees::findOne($id);
        if($query->load(\Yii::$app->request->post()) && $query->save()){
            return $this->redirect(['view','id' => $query->employeeID]); }
        return $this->render('update',['model'=>$query]);}
    
    
    public function actionDelete($id){
        $query = Employees::findOne($id)->delete();
        return $this->redirect(['index']);
    }
    
    public function actionCreate(){
        // Rbac::userCan('create');
         $employees = new Employees();
         if($employees->load(\Yii::$app->request->post()) && $employees->save()){
         return $this->redirect(['index']); }
         return $this->render('create',['model'=>$employees]);}

    
    
}
