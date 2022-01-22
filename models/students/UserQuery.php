<?php

namespace app\models\students;

/**
 * This is the ActiveQuery class for [[Students]].
 *
 * @see Students
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Students[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Students|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
