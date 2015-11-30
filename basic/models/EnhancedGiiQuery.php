<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EnhancedGii]].
 *
 * @see EnhancedGii
 */
class EnhancedGiiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EnhancedGii[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EnhancedGii|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}