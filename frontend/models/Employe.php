<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employe".
 *
 * @property integer $employe_id
 * @property string $employe_name
 * @property string $employe_phone
 * @property string $employe_address
 * @property string $employe_hourPrice
 *
 * @property EmployeLoan[] $employeLoans
 */
class Employe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employe_name', 'employe_phone', 'employe_address', 'employe_hourPrice'], 'required'],
            [['employe_hourPrice'], 'number'],
            [['employe_name', 'employe_phone', 'employe_address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employe_id' => 'Employe ID',
            'employe_name' => 'إسم الموظف',
            'employe_phone' => 'رقم المحمول',
            'employe_address' => 'العنوان',
            'employe_hourPrice' => 'قيمة الساعة',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeLoans()
    {
        return $this->hasMany(EmployeLoan::className(), ['employe_employe_id' => 'employe_id']);
    }
}
