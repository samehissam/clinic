<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inclubation_history".
 *
 * @property integer $stock_history_id
 * @property integer $item_qty
 * @property string $history_date
 * @property integer $incubation_stock_stock_id
 * @property integer $patient_patient_id
 *
 * @property IncubationStock $incubationStockStock
 * @property Patient $patientPatient
 */
class InclubationHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inclubation_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_qty', 'incubation_stock_stock_id', 'patient_patient_id'], 'required'],
            [['item_qty', 'incubation_stock_stock_id', 'patient_patient_id'], 'integer'],
            [['history_date'], 'safe'],
            [['incubation_stock_stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => IncubationStock::className(), 'targetAttribute' => ['incubation_stock_stock_id' => 'stock_id']],
            [['patient_patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_patient_id' => 'patient_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stock_history_id' => 'Stock History ID',
            'item_qty' => 'Item Qty',
            'history_date' => 'History Date',
            'incubation_stock_stock_id' => 'Incubation Stock Stock ID',
            'patient_patient_id' => 'Patient Patient ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncubationStockStock()
    {
        return $this->hasOne(IncubationStock::className(), ['stock_id' => 'incubation_stock_stock_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPatient()
    {
        return $this->hasOne(Patient::className(), ['patient_id' => 'patient_patient_id']);
    }
}
