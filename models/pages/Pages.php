<?php

namespace app\models\pages;

use Yii;

/**
 * This is the model class for table "{{%pages}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $body
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['title'], 'string', 'max' => 1000],
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
     * @return PagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagesQuery(get_called_class());
    }
}
