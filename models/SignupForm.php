<?php
namespace app\models;
use Yii;
use yii\base\Model;
use app\models\backUser;
class SignupForm extends Model {
    
    public $username,
           $email,
           $password,
           $password_again; 
    
 public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\backUser', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\backUser', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_again','compare','compareAttribute'=>'password'],
        ];
    }
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
            if (Yii::$app->session->hasFlash('register.success'))
    {
        $this->render('registerSuccess', Yii::app()->session->getFlash('register.success'));
        return;
    }
        $user = new backUser();
        $user->username = $this->username;
        $user->email = $this->email;
        $hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user->password =$hash; 
        $user->token=$user->generateToken($this->username);
        
        return $user->save(false) ? $user : null;
    }
    
    
    
}