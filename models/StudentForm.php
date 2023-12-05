<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class StudentForm extends ActiveRecord
{

    const SCENARIO_ADD = 'add';
    const SCENARIO_UPDATE = 'update';

    public $remove_image;

    public function behaviors()
    {
        return [
            ['class' => TimestampBehavior::class, 'value' => new Expression('NOW()')],
            ['class' => BlameableBehavior::class, 'updatedByAttribute' => false]
        ];
    }

    public static function tableName()
    {
        return '{{%student}}';
    }

    public function rules()
    {
        return [

            [['full_name', 'phone_no', 'email', 'dob', 'address'], 'required'],
            ['full_name', 'string', 'max' => 100],
            ['full_name', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Alphabets only'],
            ['phone_no', 'integer'],
            ['phone_no', 'string', 'min' => 10, 'max' => 10],
            ['email', 'email'],
            ['dob', 'date', 'format' => 'yyyy-mm-dd'],
            ['email', 'unique', 'targetClass' => StudentForm::class],
            ['student_img', 'file', 'extensions' => ['jpg', 'jpeg', 'png']],
            [['remove_image'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'student_img' => 'Student Image',
            'phone_no' => 'Mobile Number',
            'email' => 'Email Address',
            'dob' => 'Date of Birth'
        ];
    }



    public function addStudent()
    {
        if ($this->student_img) {
            $this->student_img->saveAs('uploads/' . $this->student_img->baseName . time() . '.' . $this->student_img->extension);
            $this->student_img = $this->student_img->baseName . time() . '.' . $this->student_img->extension;
        }
        return $this->save();
    }

    public function updateStudent($id)
    {
        $student = $this->findOne(['id' => $id]);
        if ($this->student_img === 'removed') {
            $this->student_img = null;
        } elseif ($this->student_img === null) {
            $this->student_img = $student->student_img;
        } else {
            if ($this->student_img) {
                $this->student_img->saveAs('uploads/' . $this->student_img->baseName . time() . '.' . $this->student_img->extension);
                $this->student_img = $this->student_img->baseName . time() . '.' . $this->student_img->extension;
            }
        }
        return $this->save() ? true : false;
    }

    public function getUser()
    {
        $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
