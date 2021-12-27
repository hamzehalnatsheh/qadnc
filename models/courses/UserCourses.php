<?php

namespace app\models\courses;

use Yii;

/**
 * This is the model class for table "{{%user_courses}}".
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property string|null $date_at
 */
class UserCourses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_courses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id'], 'required'],
            [['course_id', 'user_id'], 'integer'],
            [['date_at'], 'safe'],
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
            'user_id' => Yii::t('app', 'User ID'),
            'date_at' => Yii::t('app', 'Date At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserCoursesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserCoursesQuery(get_called_class());
    }
}
