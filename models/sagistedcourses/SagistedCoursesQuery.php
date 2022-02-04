<?php

namespace app\models\sagistedcourses;

/**
 * This is the ActiveQuery class for [[SagistedCourses]].
 *
 * @see SagistedCourses
 */
class SagistedCoursesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SagistedCourses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SagistedCourses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
