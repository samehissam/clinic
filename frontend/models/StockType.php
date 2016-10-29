<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock_type".
 *
 * @property integer $stock_id
 * @property string $stock_name
 */
class StockType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stock_name'], 'required'],
            [['stock_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stock_id' => 'Stock ID',
            'stock_name' => 'Stock Name',
        ];
    }
}
