<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock_item_price".
 *
 * @property integer $id
 * @property string $stock_item_price
 * @property integer $patient_type_patient_type_id
 *
 * @property PatientType $patientTypePatientType
 */
class StockItemPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_item_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stock_item_price', 'patient_type_patient_type_id'], 'required'],
            [['stock_item_price'], 'number'],
            [['patient_type_patient_type_id'], 'integer'],
            [['patient_type_patient_type_id'], 'unique'
          , 'message' => 'لقد تم تسعير المستلزمات الطبية لهذه الجهة من قبل تقدر تعدل السعر'],
            [['patient_type_patient_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientType::className(), 'targetAttribute' => ['patient_type_patient_type_id' => 'patient_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stock_item_price' => 'نسبة البيع',
            'patient_type_patient_type_id' => 'إسم الجهة',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTypePatientType()
    {
        return $this->hasOne(PatientType::className(), ['patient_type_id' => 'patient_type_patient_type_id']);
    }
}
