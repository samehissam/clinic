<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pharmacy".
 *
 * @property integer $pharmacy_id
 * @property string $pharmacy_name
 *
 * @property PharmacyNeeds[] $pharmacyNeeds
 */
class Pharmacy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pharmacy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pharmacy_name'], 'required'],
            [['pharmacy_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pharmacy_id' => 'Pharmacy ID',
            'pharmacy_name' => 'إسم الصيدلية',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPharmacyNeeds()
    {
        return $this->hasMany(PharmacyNeeds::className(), ['pharmacy_pharmacy_id' => 'pharmacy_id']);
    }
}
