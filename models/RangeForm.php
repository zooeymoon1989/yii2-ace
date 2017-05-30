<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/30
 * Time: 19:34
 */

namespace app\models;

use yii\base\Model;

class RangeForm extends Model
{
    public $from;
    public $to;

    public function rules()
    {
        return [
            [['from','to'],'number','integerOnly'=>true],
            ['from','compare','compareAttribute'=>'to','operator'=>'<=']
        ];
    }
}