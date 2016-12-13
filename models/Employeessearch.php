<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employees;

/**
 * Employeessearch represents the model behind the search form about `app\models\Employees`.
 */
class Employeessearch extends Employees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employeeID', 'salary', 'departmentID', 'titleID', 'supervisorID'], 'integer'],
            [['fName', 'lName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Employees::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'employeeID' => $this->employeeID,
            'salary' => $this->salary,
            'departmentID' => $this->departmentID,
            'titleID' => $this->titleID,
            'supervisorID' => $this->supervisorID,
        ]);

        $query->andFilterWhere(['like', 'fName', $this->fName])
            ->andFilterWhere(['like', 'lName', $this->lName]);

        return $dataProvider;
    }
}
