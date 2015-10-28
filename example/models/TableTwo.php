<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_2".
 *
 * @property integer $id
 * @property integer $t1_id
 * @property integer $t3_id
 *
 * @property Table1 $t1
 * @property Table3 $t3
 */
class TableTwo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t1_id', 't3_id'], 'required'],
            [['t1_id', 't3_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            't1_id' => 'T1 ID',
            't3_id' => 'T3 ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getT1()
    {
        return $this->hasOne(Table1::className(), ['id' => 't1_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getT3()
    {
        return $this->hasOne(Table3::className(), ['id' => 't3_id']);
    }
}
