<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/30
 * Time: 3:12
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Upload extends Model
{

    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            ['file','file','skipOnEmpty'=>false,'extensions'=>'zip']
        ];
    }

    public function upload()
    {
        if($this->validate()){
            $this->file->saveAs('uploads/'.$this->file->baseName. '.' .$this->file->extension);

            return true;
        }else{
            return false;
        }
    }

}