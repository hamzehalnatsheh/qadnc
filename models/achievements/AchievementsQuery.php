<?php

namespace app\models\achievements;

/**
 * This is the ActiveQuery class for [[Achievements]].
 *
 * @see Achievements
 */
class AchievementsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Achievements[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Achievements|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
