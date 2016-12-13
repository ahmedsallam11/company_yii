<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $employeeID
 * @property string $fName
 * @property string $lName
 * @property integer $salary
 * @property integer $departmentID
 * @property integer $titleID
 * @property integer $supervisorID
 */
class Supervisors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
   
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fName', 'lName', 'salary', 'departmentID', 'supervisorID'], 'required'],
            [['salary', 'departmentID', 'titleID', 'supervisorID'], 'integer'],
            [['fName', 'lName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employeeID' => Yii::t('app', 'Employee ID'),
            'fName' => Yii::t('app', 'F Name'),
            'lName' => Yii::t('app', 'L Name'),
            'salary' => Yii::t('app', 'Salary'),
            'departmentID' => Yii::t('app', 'Department ID'),
            'titleID' => Yii::t('app', 'Title ID'),
            'supervisorID' => Yii::t('app', 'Supervisor ID'),
        ];
    }
    public static function findSupervisors(){
        return Supervisors::find()->where(['titleID' => 1]); 
    }
    
        public function getDepartments()
    {
        return $this->hasOne(Departments::className(), ['departmentID' => 'departmentID']);
    } 
    public function getTitles()
    {
        return $this->hasOne(Titles::className(), ['titleID' => 'titleID']);
    }  
        public function getEmployees()
    {
        return $this->hasOne(Employees::className(), ['supervisorID' => 'employeeID']);
    }     
}
