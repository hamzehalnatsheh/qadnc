<?php

namespace app\models\sagistedcourses;

use Yii;

/**
 * This is the model class for table "{{%sagisted_courses}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $body
 */
class SagistedCourses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sagisted_courses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SagistedCoursesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SagistedCoursesQuery(get_called_class());
    }
}
