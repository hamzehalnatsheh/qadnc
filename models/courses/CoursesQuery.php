<?php

namespace app\models\courses;

/**
 * This is the ActiveQuery class for [[Courses]].
 *
 * @see Courses
 */
class CoursesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Courses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Courses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
