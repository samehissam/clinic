<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BankMovement;

/**
 * BankMovementSearch represents the model behind the search form about `app\models\BankMovement`.
 */
class BankMovementSearch extends BankMovement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['movement_id', 'transaction_state'], 'integer'],
            [['money'], 'number'],
            [['transaction_date', 'comment'], 'safe'],
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
        $query = BankMovement::find();

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
            'movement_id' => $this->movement_id,
            'money' => $this->money,
            'transaction_date' => $this->transaction_date,
            'transaction_state' => $this->transaction_state,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
