<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property integer $item_id
 * @property string $item_name
 * @property string $item_buyPrice
 * @property integer $item_qty
 * @property string $in_date
 *
 * @property IncubationStock[] $incubationStocks
 * @property IndoorStock[] $indoorStocks
 * @property InventoryHistory[] $inventoryHistories
 * @property StockItemPrice[] $stockItemPrices
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'item_buyPrice', 'item_qty'], 'required'],
            [['item_buyPrice'], 'number'],
            [['item_qty'], 'integer'],
            [['in_date'], 'safe'],
            [['item_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_name' => 'إسم الصنف',
            'item_buyPrice' => 'سعر الشراء',
            'item_qty' => 'الكمية',
            'in_date' => 'In Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncubationStocks()
    {
        return $this->hasMany(IncubationStock::className(), ['inventory_item_id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndoorStocks()
    {
        return $this->hasMany(IndoorStock::className(), ['inventory_item_id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryHistories()
    {
        return $this->hasMany(InventoryHistory::className(), ['inventory_item_id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockItemPrices()
    {
        return $this->hasMany(StockItemPrice::className(), ['inventory_item_id' => 'item_id']);
    }
}
