<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Rbac;
use yii\web\Session;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\backUser;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    
//    public function beforeAction($action)
//{
//    //if (parent::beforeAction($action)) {
//       return Rbac::userCan($this->action->id);
//       //$this->action->id == 'lang' 
//        
//        
//}
    public function behaviors(){

return [
       'access' => [
           'class' => AccessControl::className(),
           'only' => ['logout', 'signup', 'about'],
           'rules' => [
               [
                   'actions' => ['signup'],
                   'allow' => true,
                   'roles' => ['?'],
               ],
    
               [
                   'actions' => ['logout'],
                   'allow' => true,
                   'roles' => ['@'],
               ],
               [
                   'actions' => ['about'],
                   'allow' => true,
                   'roles' => ['@'],
                   'matchCallback' => function ($rule, $action) {
                       return User::isUserAdmin(Yii::$app->user->identity->username);
                   }
               ],
           ],
       ],
       'verbs' => [
           'class' => VerbFilter::className(),
           'actions' => [
           'logout' => ['post'],
           ],
       ],
   ];

        
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        //use yii\web\Controller;
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
   if (!\Yii::$app->user->isGuest) {
      return $this->goHome();
   }
 
   $model = new LoginForm();
   if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->redirect('/profile/view');
   } else {
       return $this->render('login', [
          'model' => $model,
       ]);
   }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
 public function actionSignup()
    {
        $model = new SignupForm ();
        //$user = new Users();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
              $email = \Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom('Auto_sender@company.com')
                ->setSubject('Signup Confirmation')->setTextBody(" Click this link to confirm".Url::toRoute(['http://'.$_SERVER['SERVER_NAME'].'/confirm','id'=>base64_encode($user->id),'token'=>$user->token]))->send();
                if($email){
                Yii::$app->getSession()->setFlash('success','Check Your email!');
                }else{
                Yii::$app->getSession()->setFlash('warning','Failed, contact Admin!');
                }  
                return $this->redirect(['login']);
                }
                }
                return $this->render('signup', [
                'model' => $model,
                ]);
                }
    
        public function actionConfirm() {
        $token = Yii::$app->getRequest()->getQueryParam('token');
        $encUserID = Yii::$app->getRequest()->getQueryParam('id');    
         if(backUser::findOneByIDToken(base64_decode($encUserID),$token)){
            if(!backUser::isActive(base64_decode($encUserID))){    
             if(backUser::activateUser(base64_decode($encUserID))){
             Yii::$app->session->setFlash('success', "Congratulation! <br> Your Account is active now");}
             else{Yii::$app->session->setFlash('warning', "Error!");}   
            }else{Yii::$app->session->setFlash('success', "Your Account is already active");}
             return Yii::$app->getResponse()->redirect(array('login'));
            }else{
             echo "No DATA";
         } 
       }
}
