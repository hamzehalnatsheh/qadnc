<?php

namespace app\models\consultation;

/**
 * This is the ActiveQuery class for [[Consultation]].
 *
 * @see Consultation
 */
class ConsultationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Consultation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Consultation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
