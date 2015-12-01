<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "table_3".
 *
 * @property integer $id
 * @property integer $t4_id
 *
 * @property Table2[] $table2s
 * @property Table4 $t4
 */
class TableThree extends ActiveRecord
{
    public static function tableName()
    {
        return 'table_3';
    }

    public function rules()
    {
        return [
            [['t4_id'], 'required'],
            [['t4_id'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            't4_id' => 'T4 ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getTableFourRecords()
    // {
    //     return $this->hasMany(TableFour::className(), ['id' => 't4_id']);
    // }
    public function getTableFourRecord()
    {
        return $this->hasOne(TableFour::className(), ['id' => 't4_id']);
    }
}
