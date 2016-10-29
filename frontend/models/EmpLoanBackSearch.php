<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmpLoanBack;

/**
 * EmpLoanBackSearch represents the model behind the search form about `app\models\EmpLoanBack`.
 */
class EmpLoanBackSearch extends EmpLoanBack
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_back_id', 'employe_employe_id'], 'integer'],
            [['loan_back_cost'], 'number'],
            [['back_date'], 'safe'],
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
        $query = EmpLoanBack::find();

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
            'loan_back_id' => $this->loan_back_id,
            'loan_back_cost' => $this->loan_back_cost,
            'back_date' => $this->back_date,
            'employe_employe_id' => $this->employe_employe_id,
        ]);

        return $dataProvider;
    }
}
