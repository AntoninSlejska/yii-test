<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_4".
 *
 * @property integer $id
 *
 * @property Table3[] $table3s
 */
class TableFour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_4';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTable3s()
    {
        return $this->hasMany(Table3::className(), ['t4_id' => 'id']);
    }
}
