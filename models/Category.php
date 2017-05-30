<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/27
 * Time: 1:16
 */

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public function rules()
    {
        return [
            ['title', 'string'],
        ];
    }

    /**
     * @return array
     */
    public static function getSubCategories($categoryId)
    {
        $subCategories = [];
        if ($categoryId) {
            $subCategories = self::find()
                ->where(['category_id' => $categoryId])
                ->asArray()
                ->all();
        }
        return $subCategories;
    }

}