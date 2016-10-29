<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employe;

/**
 * EmployeSearch represents the model behind the search form about `app\models\Employe`.
 */
class EmployeSearch extends Employe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employe_id'], 'integer'],
            [['employe_name', 'employe_phone', 'employe_address'], 'safe'],
            [['employe_hourPrice'], 'number'],
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
        $query = Employe::find();

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
            'employe_id' => $this->employe_id,
            'employe_hourPrice' => $this->employe_hourPrice,
        ]);

        $query->andFilterWhere(['like', 'employe_name', $this->employe_name])
            ->andFilterWhere(['like', 'employe_phone', $this->employe_phone])
            ->andFilterWhere(['like', 'employe_address', $this->employe_address]);

        return $dataProvider;
    }
}
