<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StockItemPrice;

/**
 * StockItemPriceSearch represents the model behind the search form about `app\models\StockItemPrice`.
 */
class StockItemPriceSearch extends StockItemPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_type_patient_type_id'], 'integer'],
            [['stock_item_price'], 'number'],
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
        $query = StockItemPrice::find();

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
            'stock_item_price' => $this->stock_item_price,
            'patient_type_patient_type_id' => $this->patient_type_patient_type_id,
        ]);

        return $dataProvider;
    }
}
