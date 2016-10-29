<?php

namespace app\models;

use Yii;

/** 
 * This is the model class for table "attendance".
 *
 * @property integer $attend_id
 * @property string $name
 * @property integer $emp_code
 * @property string $attend_time
 */
class Attendance extends \yii\db\ActiveRecord
{
     public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'emp_code'], 'required'],
             [['file'],'file'],
            [['emp_code'], 'integer'],
            [['attend_time'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attend_id' => 'Attend ID',
            'name' => 'Name',
            'emp_code' => 'Emp Code',
            'attend_time' => 'Attend Time',
        ];
    }
}
