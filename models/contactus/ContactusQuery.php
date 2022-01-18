<?php

namespace app\models\contactus;

/**
 * This is the ActiveQuery class for [[Contactus]].
 *
 * @see Contactus
 */
class ContactusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Contactus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Contactus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
