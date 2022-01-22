<?php

namespace app\models\studentcourses;

use app\models\courses\Courses;
use app\models\students\Student;
use app\models\User;
use Yii;

/**
 * This is the model class for table "student_courses".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $student_id
 */
class StudentCourses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'student_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'student_id' => Yii::t('app', 'Student ID'),
        ];
    }


    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }


    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }




    /**
     * {@inheritdoc}
     * @return StudentCoursesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentCoursesQuery(get_called_class());
    }
}
