<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_type".
 *
 * @property integer $patient_type_id
 * @property string $patient_type_name
 *
 * @property AnalysisPrice[] $analysisPrices
 * @property MedicalServicePrice[] $medicalServicePrices
 * @property RoomPrice[] $roomPrices
 * @property StockItemPrice[] $stockItemPrices
 * @property XrayPrice[] $xrayPrices
 */
class PatientType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_type_name'], 'required'],
            [['patient_type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_type_id' => 'Patient Type ID',
            'patient_type_name' => 'Patient Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalysisPrices()
    {
        return $this->hasMany(AnalysisPrice::className(), ['patient_type_patient_type_id' => 'patient_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalServicePrices()
    {
        return $this->hasMany(MedicalServicePrice::className(), ['patient_type_patient_type_id' => 'patient_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomPrices()
    {
        return $this->hasMany(RoomPrice::className(), ['patient_type_patient_type_id' => 'patient_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockItemPrices()
    {
        return $this->hasMany(StockItemPrice::className(), ['patient_type_patient_type_id' => 'patient_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXrayPrices()
    {
        return $this->hasMany(XrayPrice::className(), ['patient_type_patient_type_id' => 'patient_type_id']);
    }
}
