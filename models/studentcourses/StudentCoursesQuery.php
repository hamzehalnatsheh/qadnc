<?php

namespace app\models\studentcourses;

/**
 * This is the ActiveQuery class for [[StudentCourses]].
 *
 * @see StudentCourses
 */
class StudentCoursesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StudentCourses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StudentCourses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
