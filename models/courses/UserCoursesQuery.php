<?php

namespace app\models\courses;

/**
 * This is the ActiveQuery class for [[UserCourses]].
 *
 * @see UserCourses
 */
class UserCoursesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserCourses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserCourses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
