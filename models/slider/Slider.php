<?php

namespace app\models\slider;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $image
 * @property string|null $body
 */
class Slider extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','body'],'required'],
            [['body'], 'string'],
            [['title', 'image'], 'string', 'max' => 500],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
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
            'image' => Yii::t('app', 'Image'),
            'body' => Yii::t('app', 'Body'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }
}
