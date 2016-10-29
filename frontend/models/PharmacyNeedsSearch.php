<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PharmacyNeeds;

/**
 * PharmacyNeedsSearch represents the model behind the search form about `app\models\PharmacyNeeds`.
 */
class PharmacyNeedsSearch extends PharmacyNeeds
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_qty', 'pharmacy_pharmacy_id'], 'integer'],
            [['item_name', 'in_date'], 'safe'],
            [['buy_cost'], 'number'],
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
        $query = PharmacyNeeds::find();

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
            'id' => $this->id,
            'in_date' => $this->in_date,
            'buy_cost' => $this->buy_cost,
            'item_qty' => $this->item_qty,
            'pharmacy_pharmacy_id' => $this->pharmacy_pharmacy_id,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }
}
