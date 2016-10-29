<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DoctorNeeds;

/**
 * DoctorNeedsSearch represents the model behind the search form about `app\models\DoctorNeeds`.
 */
class DoctorNeedsSearch extends DoctorNeeds
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['need_id', 'item_qty', 'inventory_item_id', 'doctor_doctor_id'], 'integer'],
            [['out_date'], 'safe'],
            [['item_cost'], 'number'],
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
        $query = DoctorNeeds::find();

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
            'need_id' => $this->need_id,
            'out_date' => $this->out_date,
            'item_qty' => $this->item_qty,
            'item_cost' => $this->item_cost,
            'inventory_item_id' => $this->inventory_item_id,
            'doctor_doctor_id' => $this->doctor_doctor_id,
        ]);

        return $dataProvider;
    }
}
