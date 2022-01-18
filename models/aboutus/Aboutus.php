<?php

namespace app\models\aboutus;

use Yii;

/**
 * This is the model class for table "{{%aboutus}}".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 */
class Aboutus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%aboutus}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 500],
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
     * @return AboutusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AboutusQuery(get_called_class());
    }
}
