<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emp_loan_back".
 *
 * @property integer $loan_back_id
 * @property string $loan_back_cost
 * @property string $back_date
 * @property integer $employe_employe_id
 *
 * @property Employe $employeEmploye
 */
class EmpLoanBack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_loan_back';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_back_cost', 'employe_employe_id'], 'required'],
            [['loan_back_cost'], 'number'],
            [['back_date'], 'safe'],
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
            'loan_back_id' => 'Loan Back ID',
            'loan_back_cost' => 'Loan Back Cost',
            'back_date' => 'Back Date',
            'employe_employe_id' => 'Employe Employe ID',
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
