<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prize".
 *
 * @property integer $id
 * @property string $name
 * @property integer $amount
 *
 * @property ContestPrizeAssn[] $contestPrizeAssns
 */
class Prize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContestPrizeAssns()
    {
        return $this->hasMany(ContestPrizeAssn::className(), ['prize_id' => 'id']);
    }
}
