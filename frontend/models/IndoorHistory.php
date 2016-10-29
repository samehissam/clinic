<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indoor_history".
 *
 * @property integer $indoor_history_id
 * @property integer $item_qty
 * @property string $history_date
 * @property integer $indoor_stock_stock_id
 * @property integer $patient_patient_id
 *
 * @property IndoorStock $indoorStockStock
 * @property Patient $patientPatient
 */
class IndoorHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indoor_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_qty', 'patient_patient_id'], 'required'],
            [['item_qty', 'indoor_stock_stock_id', 'patient_patient_id'], 'integer'],
            [['history_date'], 'safe'],
            [['indoor_stock_stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => IndoorStock::className(), 'targetAttribute' => ['indoor_stock_stock_id' => 'stock_id']],
            [['patient_patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_patient_id' => 'patient_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'indoor_history_id' => 'Indoor History ID',
            'item_qty' => 'Item Qty',
            'history_date' => 'History Date',
            'indoor_stock_stock_id' => 'Indoor Stock Stock ID',
            'patient_patient_id' => 'Patient Patient ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndoorStockStock()
    {
        return $this->hasOne(IndoorStock::className(), ['stock_id' => 'indoor_stock_stock_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPatient()
    {
        return $this->hasOne(Patient::className(), ['patient_id' => 'patient_patient_id']);
    }
}
