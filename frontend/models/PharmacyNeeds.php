<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pharmacy_needs".
 *
 * @property integer $id
 * @property string $item_name
 * @property string $in_date
 * @property string $buy_cost
 * @property integer $item_qty
 * @property integer $pharmacy_pharmacy_id
 *
 * @property Pharmacy $pharmacyPharmacy
 */
class PharmacyNeeds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pharmacy_needs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'buy_cost', 'item_qty', 'pharmacy_pharmacy_id'], 'required'],
            [['in_date'], 'safe'],
            [['buy_cost'], 'number'],
            [['item_qty', 'pharmacy_pharmacy_id'], 'integer'],
            [['item_name'], 'string', 'max' => 255],
            [['pharmacy_pharmacy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pharmacy::className(), 'targetAttribute' => ['pharmacy_pharmacy_id' => 'pharmacy_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_name' => 'إسم الصنف',
            'in_date' => 'In Date',
            'buy_cost' => 'سعر الشراء',
            'item_qty' => 'الكمية',
            'pharmacy_pharmacy_id' => 'إسم الصيدلية أو المركز',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPharmacyPharmacy()
    {
        return $this->hasOne(Pharmacy::className(), ['pharmacy_id' => 'pharmacy_pharmacy_id']);
    }
}
