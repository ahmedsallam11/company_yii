<?php
namespace app\models;
use app\models\backUser;
use Yii;
use yii\web\Controller;
use yii\web\Session;
class Rbac extends backUser {
 
    //public static $rules = array();
    
    
    public static function AccessRules(){
        
        $adminRules = ['create','delete','update','index','view'];
        $editorRules = ['view','update','index'];
        $ordRules = ['index','view'];
        $rules = ['admin'=>$adminRules,'editor'=>$editorRules,'ord'=>$ordRules];
        return $rules;
    }
    
    public function getUserRole()
    {
        $user = backUser::find()->where(['userID'=>Yii::$app->user->getID()])->one();
        if ($user !==null){
            switch($user->roleID):
            case 1:
            return $userRole = "admin";
            break;
            
            case 2:
            return $userRole = "editor";
            break;
            
            case 3:
            return $userRole = "ord";
            break;   
            endswitch;
        }
         else return false;
    }
    
    public static function adminOnly(){
         if(!Yii::$app->user->isGuest){    
          $userRole=self::getUserRole();
          if(!empty($userRole) && $userRole == 'admin'){
            return true;
         }else{Yii::$app->getSession()->setFlash('warning','You are not allowed to perform this action!');
               return Controller::redirect('/profile/view');}
         }else{return Controller::redirect('/login');}
    }
    
    public static function userCan($action){
        if(!Yii::$app->user->isGuest){
        if(backUser::isActive(Yii::$app->user->getID())){   
        $userRole=self::getUserRole();
        if(!empty($userRole)){
         if(in_array($action,self::AccessRules()[$userRole])){
          return true;     
         }else{
          Yii::$app->getSession()->setFlash('warning','You are not allowed to perform this action!');
          return Controller::redirect(Yii::$app->request->referrer);        
         } 
         }else {
          Yii::$app->getSession()->setFlash('warning','You Must login first!');  
          return Controller::redirect('/profile/view'); }
         }else{Yii::$app->getSession()->setFlash('warning','You must activate your account first!');
               return Controller::redirect('/profile/view');}
         }else{return Controller::redirect('/login');}
    }
}