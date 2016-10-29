<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor_needs".
 *
 * @property integer $need_id
 * @property string $out_date
 * @property integer $item_qty
 * @property string $item_cost
 * @property integer $inventory_item_id
 * @property integer $doctor_doctor_id
 *
 * @property Doctor $doctorDoctor
 * @property Inventory $inventoryItem
 */
class DoctorNeeds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_needs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['out_date'], 'safe'],
            [['item_qty', 'inventory_item_id'], 'required'],
            [['item_qty', 'inventory_item_id', 'doctor_doctor_id'], 'integer'],
            [['item_cost'], 'number'],
            [['doctor_doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_doctor_id' => 'doctor_id']],
            [['inventory_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::className(), 'targetAttribute' => ['inventory_item_id' => 'item_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'need_id' => 'Need ID',
            'out_date' => 'Out Date',
            'item_qty' => 'Item Qty',
            'item_cost' => 'Item Cost',
            'inventory_item_id' => 'Inventory Item ID',
            'doctor_doctor_id' => 'Doctor Doctor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorDoctor()
    {
        return $this->hasOne(Doctor::className(), ['doctor_id' => 'doctor_doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryItem()
    {
        return $this->hasOne(Inventory::className(), ['item_id' => 'inventory_item_id']);
    }
}
