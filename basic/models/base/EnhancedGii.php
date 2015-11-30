<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "sample".
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
class EnhancedGii extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sample';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
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

/**
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\EnhancedGiiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EnhancedGiiQuery(get_called_class());
    }
}
