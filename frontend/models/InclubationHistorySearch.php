<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InclubationHistory;

/**
 * InclubationHistorySearch represents the model behind the search form about `app\models\InclubationHistory`.
 */
class InclubationHistorySearch extends InclubationHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stock_history_id', 'item_qty', 'incubation_stock_stock_id', 'patient_patient_id'], 'integer'],
            [['history_date'], 'safe'],
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
        $query = InclubationHistory::find();

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
            'stock_history_id' => $this->stock_history_id,
            'item_qty' => $this->item_qty,
            'history_date' => $this->history_date,
            'incubation_stock_stock_id' => $this->incubation_stock_stock_id,
            'patient_patient_id' => $this->patient_patient_id,
        ]);

        return $dataProvider;
    }
}
