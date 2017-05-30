<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/30
 * Time: 12:34
 */

namespace app\models;

use yii\base\Model;
use yii\captcha\Captcha;

class EmailForm extends Model
{

    public $email;
    public $verifyCode;

    public function rules()
    {
        return [
            ['email','email'],
            ['verifyCode','captcha','skipOnEmpty'=>!Captcha::checkRequirements(),'captchaAction'=>'email/captcha']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'verifyCode' => 'verifyCode',
        ];
    }
}