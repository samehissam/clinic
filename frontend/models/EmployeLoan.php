<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employe_loan".
 *
 * @property integer $loan_id
 * @property string $loan_cost
 * @property string $loan_date
 * @property integer $employe_employe_id
 *
 * @property Employe $employeEmploye
 */
class EmployeLoan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employe_loan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_cost', 'employe_employe_id'], 'required'],
            [['loan_cost'], 'number'],
            [['loan_date'], 'safe'],
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
            'loan_id' => 'Loan ID',
            'loan_cost' => 'قيمة السلفة',
            'loan_date' => 'Loan Date',
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
