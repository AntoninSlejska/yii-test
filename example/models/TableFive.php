<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_5".
 *
 * @property integer $id
 * @property integer $t3_id
 *
 * @property Table3 $t3
 */
class TableFive extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_5';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t3_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            't3_id' => 'T3 ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getT3()
    {
        return $this->hasOne(Table3::className(), ['id' => 't3_id']);
    }
}
