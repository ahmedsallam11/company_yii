<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $departmentID
 * @property string $departmentName
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentName'], 'required'],
            [['departmentName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departmentID' => Yii::t('app', 'Department ID'),
            'departmentName' => Yii::t('app', 'Department Name'),
        ];
    }
    
    public function getEmployees()
    {
        return $this->hasMany(Departments::className(), ['departmentID' => 'departmentID']);
    } 
    public function getSupervisors()
    {
        return $this->hasOne(Supervisors::className(), ['departmentID' => 'departmentID']);
    }     
}
