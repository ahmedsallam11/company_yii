<?php

namespace app\modules\company\models;

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
            'fName' => Yii::t('app', 'First name'),
            'lName' => Yii::t('app', 'Last name'),
            'salary' => Yii::t('app', 'Salary'),
            'departmentID' => Yii::t('app', 'Department ID'),
            'departmentName' => Yii::t('app', 'Department'),
            'titleID' => Yii::t('app', 'Title ID'),
            'supervisorID' => Yii::t('app', 'Supervisor ID'),
            'SuperFullName' => Yii::t('app', 'Supervisor'),
            'EmpFullName' => Yii::t('app', 'Name'),     
        ];
    }
       
    public static function getDepartmentID($id){
        $employee = self::findOne($id);
        $departmentID = $employee->departmentID;
        return $departmentID;
    }
     public function getDepartment(){
        return $this->hasOne(Departments::className(), ['departmentID' => 'departmentID']);
    }
  
     public function getSupervisor(){
        return $this->hasOne(self::className(), ['employeeID' => 'supervisorID'])->where(['titleID'=>1])->
               from(self::tableName() . ' AS parent');
    }
    
     public function getSuperFullName(){
        $superFullName = $this->supervisor['fName'];
        $superFullName .= " ";
        $superFullName .= $this->supervisor['lName'];
        return $superFullName;
    }
     public function getEmpFullName(){
        $empFullName = $this->fName;
        $empFullName .= " ";
        $empFullName .= $this->lName;
        return $empFullName;
    }
}
