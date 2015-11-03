<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_1".
 *
 * @property integer $id
 *
 * @property Table2[] $table2s
 */
class TableOne extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    public function getTableTwoRecords()
    {
        return $this->hasMany(TableTwo::className(), ['t1_id' => 'id']);
    }
    public function getTableThreeRecords()
    {
        return $this->hasMany(TableThree::className(), ['id' => 't3_id'])
            ->via('tableTwoRecords');
    }
    // public function getTableFourRecords()
    // {
    //     return $this->hasOne(TableFour::className(), ['id' => 't4_id']);
    // }
    public function getTableFourRecords()
    {
        return $this->hasMany(TableFour::className(), ['id' => 't4_id'])
            ->viaTable('table_3', ['id' => 't3_id'])
            ->viaTable('table_2', ['t1_id' => 'id']);
    }
}
