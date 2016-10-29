<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction_type".
 *
 * @property integer $transaction_id
 * @property string $type_name
 */
class TransactionType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => 'Transaction ID',
            'type_name' => 'Type Name',
        ];
    }
}
