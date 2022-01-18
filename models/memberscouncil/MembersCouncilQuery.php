<?php

namespace app\models\memberscouncil;

/**
 * This is the ActiveQuery class for [[MembersCouncil]].
 *
 * @see MembersCouncil
 */
class MembersCouncilQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MembersCouncil[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MembersCouncil|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
