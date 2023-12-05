<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirm;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password', 'password_confirm'], 'required'],
            [['first_name', 'last_name'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Alphabets only'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class],
            ['password', 'string', 'min' => 6],
            ['password_confirm', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function attributeLabels()
    {
        return [
            'password_confirm' => 'Confirm Password'
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User;
            if ($user->validate()) {
                $user->first_name = $this->first_name;
                $user->last_name = $this->last_name;
                $user->email = $this->email;
                $user->password = $user->hashPassword($this->password);
                $user->auth_key = $user->generateAuthKey();
                return $user->save() ? true : false;
            }
        }
        return false;
    }
}
