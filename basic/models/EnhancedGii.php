<?php

namespace app\models;

use Yii;
use \app\models\base\EnhancedGii as BaseEnhancedGii;

/**
 * This is the model class for table "sample".
 */
class EnhancedGii extends BaseEnhancedGii
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goodness', 'rank'], 'integer'],
            [['rank', 'censorship', 'occurred', 'filename', 'avatar'], 'required'],
            [['occurred'], 'safe'],
            [['thought', 'censorship', 'email', 'url', 'filename', 'avatar'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
	
}
