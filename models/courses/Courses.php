<?php

namespace app\models\courses;

use Yii;

/**
 * This is the model class for table "{{%courses}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $start_at
 * @property string|null $end_at
 * @property string|null $image
 * @property int|null $category
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $update_at
 * @property string|null $deleted_at
 */
class Courses extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%courses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['start_at', 'end_at', 'created_at', 'update_at', 'deleted_at'], 'safe'],
            [['category', 'status'], 'integer'],
            [['title'], 'string', 'max' => 1000],
            [['image'], 'string', 'max' => 256],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,gif'],
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
            'description' => Yii::t('app', 'Description'),
            'start_at' => Yii::t('app', 'Start At'),
            'end_at' => Yii::t('app', 'End At'),
            'image' => Yii::t('app', 'Image'),
            'category' => Yii::t('app', 'Category'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'update_at' => Yii::t('app', 'Update At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CoursesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CoursesQuery(get_called_class());
    }
}
