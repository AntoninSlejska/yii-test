<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use cornernote\linkall\LinkAllBehavior;
use voskobovich\behaviors\ManyToManyBehavior;

/**
 * This is the model class for table "table_1".
 *
 * @property integer $id
 *
 * @property Table2[] $table2s
 */
class TableOne extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => LinkAllBehavior::className(),
            ],
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'three_list' => 'tableThreeRecords',
                ],
            ],
        ];

    }

    public static function tableName()
    {
        return 'table_1';
    }

    public function rules()
    {
        return [
            [['three_list'], 'safe']
        ];
    }

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
            //->viaTable('table_2', ['t1_id' => 'id']);
    }

}
