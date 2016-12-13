<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userstatus".
 *
 * @property integer $statusID
 * @property string $status
 */
class Userstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statusID', 'status'], 'required'],
            [['statusID'], 'integer'],
            [['status'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statusID' => Yii::t('app', 'Status ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
   public function getbackUser()
    {
        return $this->hasMany(backUser::className(), ['statusID' => 'statusID']);
    }    
    
}
