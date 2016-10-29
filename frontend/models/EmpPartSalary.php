<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emp_part_salary".
 *
 * @property integer $part_id
 * @property string $part_cost
 * @property string $part_date
 * @property integer $employe_employe_id
 *
 * @property Employe $employeEmploye
 */
class EmpPartSalary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_part_salary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['part_cost', 'employe_employe_id'], 'required'],
            [['part_cost'], 'number'],
            [['part_date'], 'safe'],
            [['employe_employe_id'], 'integer'],
            [['employe_employe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employe::className(), 'targetAttribute' => ['employe_employe_id' => 'employe_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'part_id' => 'Part ID',
            'part_cost' => 'المبلغ المستقطع',
            'part_date' => 'Part Date',
            'employe_employe_id' => 'حدد الموظف',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeEmploye()
    {
        return $this->hasOne(Employe::className(), ['employe_id' => 'employe_employe_id']);
    }
}
