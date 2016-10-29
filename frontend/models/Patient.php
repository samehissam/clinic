<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $patient_id
 * @property string $patient_name
 * @property string $patient_address
 * @property string $patient_age
 * @property string $patient_nationality
 * @property string $patient_gender
 * @property string $patient_ssn
 * @property integer $patient_type_patient_type_id
 *
 * @property InclubationHistory[] $inclubationHistories
 * @property IndoorHistory[] $indoorHistories
 * @property MedicalInsurance[] $medicalInsurances
 * @property PatientType $patientTypePatientType
 * @property PatientReservation[] $patientReservations
 * @property PatientSession[] $patientSessions
 * @property PatientTransaction[] $patientTransactions
 * @property RoomReservation[] $roomReservations
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_name', 'patient_address', 'patient_age', 'patient_nationality', 'patient_gender', 'patient_ssn', 'patient_type_patient_type_id'], 'required'],
            [['patient_type_patient_type_id'], 'integer'],
            [['patient_name', 'patient_address', 'patient_nationality'], 'string', 'max' => 255],
            [['patient_age'], 'string', 'max' => 225],
            [['patient_gender', 'patient_ssn'], 'string', 'max' => 45],
            [['patient_type_patient_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientType::className(), 'targetAttribute' => ['patient_type_patient_type_id' => 'patient_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'patient_name' => 'Patient Name',
            'patient_address' => 'Patient Address',
            'patient_age' => 'Patient Age',
            'patient_nationality' => 'Patient Nationality',
            'patient_gender' => 'Patient Gender',
            'patient_ssn' => 'Patient Ssn',
            'patient_type_patient_type_id' => 'Patient Type Patient Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInclubationHistories()
    {
        return $this->hasMany(InclubationHistory::className(), ['patient_patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndoorHistories()
    {
        return $this->hasMany(IndoorHistory::className(), ['patient_patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalInsurances()
    {
        return $this->hasMany(MedicalInsurance::className(), ['patient_patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTypePatientType()
    {
        return $this->hasOne(PatientType::className(), ['patient_type_id' => 'patient_type_patient_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientReservations()
    {
        return $this->hasMany(PatientReservation::className(), ['patient_patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientSessions()
    {
        return $this->hasMany(PatientSession::className(), ['patient_patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientTransactions()
    {
        return $this->hasMany(PatientTransaction::className(), ['patient_patient_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomReservations()
    {
        return $this->hasMany(RoomReservation::className(), ['patient_patient_id' => 'patient_id']);
    }
}
