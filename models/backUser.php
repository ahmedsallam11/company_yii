<?php

namespace app\models;

use Yii;
use  app\models\auth\AuthAssignment;

/**
 * This is the model class for table "users".
 *
 * @property integer $userID
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $roleID
 * @property integer $statusID
 * @property string $token
 */
class backUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'token'], 'required'],
            [['roleID', 'statusID'], 'integer'],
            [['username', 'email', 'password'], 'string', 'max' => 250],
            [['token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userID' => Yii::t('app', 'User ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'roleID' => Yii::t('app', 'Role ID'),
            'statusID' => Yii::t('app', 'Status ID'),
            'token' => Yii::t('app', 'token'),
        ];
    }
    
    
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
throw new yii\base\NotSupportedException;
        }



    public function getId()
    {
        return $this->userID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->token;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $token === $authKey;
    }

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
    
    public function validatePassword($password){
        return password_verify($password,$this->password);
    }
    

    
    public function generateToken($username){
      return md5($username.microtime().rand()); 
    }
       public static function isActive($id){
        return self::findOne(['userID' => $id, 'statusID' => 1]);
    }
        public static function findOneByIDToken($id,$token)
    {
        return self::findOne(['userID' => $id, 'token' => $token]);
    }
    public static function activateUser($id){
        $user=self::findOne($id);
        $user->statusID=1;
        return $user->update();
    }
    

   public function getStatus()
    {
        return $this->hasOne(Userstatus::className(), ['statusID' => 'statusID']);
    }   
       public function getRole()
    {
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'userID']);
    } 
    
}
