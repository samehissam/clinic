<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmpPartSalary;

/**
 * EmpPartSalarySearch represents the model behind the search form about `app\models\EmpPartSalary`.
 */
class EmpPartSalarySearch extends EmpPartSalary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['part_id', 'employe_employe_id'], 'integer'],
            [['part_cost'], 'number'],
            [['part_date'], 'safe'],
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
        $query = EmpPartSalary::find();

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
            'part_id' => $this->part_id,
            'part_cost' => $this->part_cost,
            'part_date' => $this->part_date,
            'employe_employe_id' => $this->employe_employe_id,
        ]);

        return $dataProvider;
    }
}
