<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sample".
 *
 * @property integer $id
 * @property string $thought
 * @property integer $goodness
 * @property integer $rank
 * @property string $censorship
 * @property string $occurred
 * @property string $email
 * @property string $url
 * @property string $filename
 * @property string $avatar
 */
class SimpleGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sample';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goodness', 'rank'], 'integer'],
            [['rank', 'censorship', 'occurred', 'filename', 'avatar'], 'required'],
            [['occurred'], 'safe'],
            [['thought', 'censorship', 'email', 'url', 'filename', 'avatar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thought' => 'Thought',
            'goodness' => 'Goodness',
            'rank' => 'Rank',
            'censorship' => 'Censorship',
            'occurred' => 'Occurred',
            'email' => 'Email',
            'url' => 'Url',
            'filename' => 'Filename',
            'avatar' => 'Avatar',
        ];
    }
}
