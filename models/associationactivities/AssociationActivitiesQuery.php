<?php

namespace app\models\associationactivities;

/**
 * This is the ActiveQuery class for [[AssociationActivities]].
 *
 * @see AssociationActivities
 */
class AssociationActivitiesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AssociationActivities[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AssociationActivities|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
