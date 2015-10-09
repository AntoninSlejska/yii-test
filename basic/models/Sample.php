<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "sample".
 *
 * @property integer $id
 * @property string $thought
 * @property integer $goodness
 * @property integer $rank
 * @property string $censorship
 * @property string $occurred
 */
class Sample extends \yii\db\ActiveRecord
{
  public $captcha;

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
          [['thought'], 'string', 'max' => 255],
          ['thought', 'match', 'pattern' => '/^[a-z][A-Za-z,;\"\\s]+[!?.]/i', 'message' => Yii::t('app', 'Your thoughts should form a complete sentence of alphabetic characters.')],
          [['thought'], 'trim'],
          [['thought'], 'required'],
          [['captcha'], 'captcha'],
          [['rank'], 'integer'],
          ['rank', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => Yii::t('app', 'Rank must be between 0 and 100 inclusive.')],
          ['rank', 'compare', 'compareValue' => 100, 'operator' => '<=', 'message' => Yii::t('app', 'Rank must be between 0 and 100 inclusive.')],
          [['email'], 'email'],
          [['email'], 'exist', 'targetClass' => '\app\models\User', 'targetAttribute' => ['email'], 'message' => Yii::t('app', 'Sorry, that person hasn\'t registered yet.')],
          [['url'], 'url'],
          ['censorship', 'in', 'range' => ['yes', 'no', 'Yes', 'No'], 'message' => Yii::t('app', 'The censors demand a yes or no answer.')],
            // [['goodness'], 'boolean'],
            // [['rank'], 'integer'],
            // [['rank', 'censorship'], 'required'],
            // //[['occurred'], 'safe'],
            // ['occurred', 'date', 'format' => 'yyyy-M-d'],
            // ['goodness', 'default', 'value' => 0],
            // [['thought', 'censorship'], 'string', 'max' => 255],
            // [['thought'], 'trim'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'thought' => Yii::t('app', 'Thought'),
            'goodness' => Yii::t('app', 'Goodness'),
            'rank' => Yii::t('app', 'Rank'),
            'censorship' => Yii::t('app', 'Censorship'),
            'occurred' => Yii::t('app', 'Occurred'),
        ];
    }
}
