<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $doctor_id
 * @property string $doctor_name
 * @property string $doctor_address
 * @property string $doctor_phone
 * @property string $doctor_email
 * @property string $doctor_tax
 * @property string $doctor_type
 *
 * @property DoctorLoan[] $doctorLoans
 * @property DoctorNeeds[] $doctorNeeds
 * @property MedicalServicePrice[] $medicalServicePrices
 * @property PatientReservation[] $patientReservations
 * @property PatientTransaction[] $patientTransactions
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_name', 'doctor_address', 'doctor_phone', 'doctor_tax', 'doctor_type'], 'required'],
            [['doctor_tax'], 'number'],
            [['doctor_name', 'doctor_address', 'doctor_phone', 'doctor_email', 'doctor_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'doctor_name' => 'Doctor Name',
            'doctor_address' => 'Doctor Address',
            'doctor_phone' => 'Doctor Phone',
            'doctor_email' => 'Doctor Email',
            'doctor_tax' => 'Doctor Tax',
            'doctor_type' => 'Doctor Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorLoans()
    {
        return $this->hasMany(DoctorLoan::className(), ['doctor_doctor_id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctorNeeds()
    {
        return $this->hasMany(DoctorNeeds::className(), ['doctor_doctor_id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalServicePrices()
    {
        return $this->hasMany(MedicalServicePrice::className(), ['doctor_doctor_id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientReservations()
    {
        return $this->hasMany(PatientReservation::className(), ['doctor_doctor_id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTransactions()
    {
        return $this->hasMany(PatientTransaction::className(), ['doctor_doctor_id' => 'doctor_id']);
    }
}
