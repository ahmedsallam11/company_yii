<?php

namespace app\controllers;

use Yii;
use app\models\auth\AuthItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all AuthItem models.
     * @return mixed
     */
    
        public function actionAssign(){
        $auth = Yii::$app->authManager;
            
        $ord = $auth->createRole('ord');
        $editor = $auth->createRole('editor');
        $admin = $auth->createRole('admin');
            
        $auth->assign($admin, 1);    
        $auth->assign($editor, 2);
        $auth->assign($ord, 3);

            
        }
    public function actionRole(){
                $auth = Yii::$app->authManager;

        $index = $auth->createPermission('index');
        $view = $auth->createPermission('view');
        $create= $auth->createPermission('create');
        $update = $auth->createPermission('update');
        $delete = $auth->createPermission('delete');

            
            
        $ord = $auth->createRole('ord');
        $auth->add($ord);
        $auth->addChild($ord, $index);        
        $auth->addChild($ord, $view);
        
        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $ord);
        $auth->addChild($editor, $update);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $editor);
        $auth->addChild($admin, $create);
        $auth->addChild($admin, $delete);

    }
    public function actionPermission(){
        
        $auth = Yii::$app->authManager;

        // View index permission
        $index = $auth->createPermission('index');
        $index->description = 'View index';
        $auth->add($index);

        // create permission
        $create = $auth->createPermission('create');
        $create->description = 'create';
        $auth->add($create);

        // update permission
        $update = $auth->createPermission('update');
        $update->description = 'update';
        $auth->add($update);
        
        // delete permission
        $delete = $auth->createPermission('delete');
        $delete->description = 'delete';
        $auth->add($delete);
        
         $view = $auth->createPermission('view');
        $view->description = 'view';
        $auth->add($view);      
    }
    
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
