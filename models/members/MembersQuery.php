<?php

namespace app\models\members;

/**
 * This is the ActiveQuery class for [[Student]].
 *
 * @see Student
 */
class MembersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Student[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Student|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
