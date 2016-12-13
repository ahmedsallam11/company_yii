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
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }
    
    


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
            'employeeID' => 'Employee ID',
            'fName' => 'F Name',
            'lName' => 'L Name',
            'salary' => 'Salary',
            'departmentID' => 'Department ID',
            'titleID' => 'Title ID',
            'supervisorID' => 'Supervisor ID',
        ];
    }
    
    
    public function getDepartments()
    {
        return $this->hasOne(Departments::className(), ['departmentID' => 'departmentID']);
    } 
    public function getTitles()
    {
        return $this->hasOne(Titles::className(), ['titleID' => 'titleID']);
    }   
    
        public function getSupervisors()
    {
        return $this->hasOne(Supervisors::className(), ['supervisorID' => 'employeeID']);
    } 
}
