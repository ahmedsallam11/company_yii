<?php
namespace app\controllers;
use Yii;
use app\models\backUser;
use app\models\UsersSearch;
use app\models\auth\AuthAssignment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\user\Session;
use app\models\Rbac;
use yii\data\ActiveDataProvider; 
/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    public function beforeAction($action){    
       return Rbac::adminOnly();
       }
    
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
     
        $query = backUser::find();
        $dataProvider = new ActiveDataProvider([
         'query' => $query,
         'pagination' => [
         'pageSize' => 8 ]]);
        //$dataProvider = $dataProvider->getModels();
        return $this->render('index',['dataProvider'=>$dataProvider]);}
  

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new backUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
    
        if ($model->load(\Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->userID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = backUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

}