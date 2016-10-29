<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_history".
 *
 * @property integer $inventory_history_id
 * @property integer $item_qty
 * @property string $history_date
 * @property integer $inventory_item_id
 * @property integer $stock_type_stock_id
 *
 * @property Inventory $inventoryItem
 * @property StockType $stockTypeStock
 */
class InventoryHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_qty', 'inventory_item_id', 'stock_type_stock_id'], 'required'],
            [['item_qty', 'inventory_item_id', 'stock_type_stock_id'], 'integer'],
            [['history_date'], 'safe'],
            [['inventory_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inventory::className(), 'targetAttribute' => ['inventory_item_id' => 'item_id']],
            [['stock_type_stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => StockType::className(), 'targetAttribute' => ['stock_type_stock_id' => 'stock_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'inventory_history_id' => 'Inventory History ID',
            'item_qty' => 'الكمية',
            'history_date' => 'History Date',
            'inventory_item_id' => 'إسم الصنف',
            'stock_type_stock_id' => 'المخزن',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryItem()
    {
        return $this->hasOne(Inventory::className(), ['item_id' => 'inventory_item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockTypeStock()
    {
        return $this->hasOne(StockType::className(), ['stock_id' => 'stock_type_stock_id']);
    }
}
