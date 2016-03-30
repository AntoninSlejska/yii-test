<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $allDay
 * @property string $start
 * @property string $end
 * @property string $dow
 * @property string $className
 * @property integer $editable
 * @property string $source
 * @property string $color
 * @property string $backgroundColor
 * @property string $borderColor
 * @property string $textColor
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['allDay', 'editable'], 'integer'],
            [['start', 'end'], 'safe'],
            [['title', 'dow', 'className', 'source', 'color', 'backgroundColor', 'borderColor', 'textColor'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'allDay' => 'All Day',
            'start' => 'Start',
            'end' => 'End',
            'dow' => 'Dow',
            'className' => 'Class Name',
            'editable' => 'Editable',
            'source' => 'Source',
            'color' => 'Color',
            'backgroundColor' => 'Background Color',
            'borderColor' => 'Border Color',
            'textColor' => 'Text Color',
        ];
    }
}
