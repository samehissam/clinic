<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InventoryHistory;

/**
 * InventoryHistorySearch represents the model behind the search form about `app\models\InventoryHistory`.
 */
class InventoryHistorySearch extends InventoryHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inventory_history_id', 'item_qty', 'inventory_item_id', 'stock_type_stock_id'], 'integer'],
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
        $query = InventoryHistory::find();

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
            'inventory_history_id' => $this->inventory_history_id,
            'item_qty' => $this->item_qty,
            'history_date' => $this->history_date,
            'inventory_item_id' => $this->inventory_item_id,
            'stock_type_stock_id' => $this->stock_type_stock_id,
        ]);

        return $dataProvider;
    }
}
