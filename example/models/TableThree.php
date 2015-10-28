<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_3".
 *
 * @property integer $id
 * @property integer $t4_id
 *
 * @property Table2[] $table2s
 * @property Table4 $t4
 */
class TableThree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t4_id'], 'required'],
            [['t4_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
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
    public function getTable2s()
    {
        return $this->hasMany(Table2::className(), ['t3_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getT4()
    {
        return $this->hasOne(Table4::className(), ['id' => 't4_id']);
    }
}
