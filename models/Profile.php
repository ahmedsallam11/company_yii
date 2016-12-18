<?php

namespace app\models;

use Yii;

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
class Profile extends \yii\db\ActiveRecord
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
            [['username', 'email', 'password'], 'required'],
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
            'token' => Yii::t('app', 'Token'),
        ];
    }
}
