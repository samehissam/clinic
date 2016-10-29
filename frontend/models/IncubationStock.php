<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incubation_stock".
 *
 * @property integer $stock_id
 * @property integer $item_qty
 * @property integer $inventory_item_id
 * @property string $in_date
 *
 * @property InclubationHistory[] $inclubationHistories
 * @property Inventory $inventoryItem
 */
class IncubationStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incubation_stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_qty', 'inventory_item_id'], 'required'],
            [['item_qty', 'inventory_item_id'], 'integer'],
            [['in_date'], 'safe'],
            [['inventory_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::className(), 'targetAttribute' => ['inventory_item_id' => 'item_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stock_id' => 'Stock ID',
            'item_qty' => 'Item Qty',
            'inventory_item_id' => 'Inventory Item ID',
            'in_date' => 'In Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInclubationHistories()
    {
        return $this->hasMany(InclubationHistory::className(), ['incubation_stock_stock_id' => 'stock_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryItem()
    {
        return $this->hasOne(Inventory::className(), ['item_id' => 'inventory_item_id']);
    }
}