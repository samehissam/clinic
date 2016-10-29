<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bank_movement".
 *
 * @property integer $movement_id
 * @property string $money
 * @property string $transaction_date
 * @property integer $transaction_state
 * @property string $comment
 */
class BankMovement extends \yii\db\ActiveRecord
{
    /** 
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bank_movement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money','transaction_date','transaction_state'], 'required'],
            [['money'], 'number'],
            [['transaction_date'], 'safe'],
            [['transaction_state'], 'integer'],
            [['comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'movement_id' => 'Movement ID',
            'money' => 'Money',
            'transaction_date' => 'Transaction Date',
            'transaction_state' => 'Transaction State',
            'comment' => 'Comment',
        ];
    }
}
