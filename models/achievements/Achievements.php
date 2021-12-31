<?php

namespace app\models\achievements;

use Yii;

/**
 * This is the model class for table "{{%achievements}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $body
 * @property string|null $image
 * @property string|null $vedio
 */
class Achievements extends \yii\db\ActiveRecord
{
    public  $file;
    public  $vedio_file;
    public $ext="3g2,3gp,avi,flv,h264,m4v,webm,mkv,mov,mp4,mpg,mpeg,rm,swf,vob,wmv,qt,ogv,avchd,amv,m4p,MOV";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%achievements}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['title'], 'string', 'max' => 1000],
            [['vedio'], 'string', 'max' => 265],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,gif'],
            ['vedio_file', 'file', 'extensions' => $this->ext , 'maxSize' => 1024 * 1024 * 350 , 'tooBig' => 'Limit is 350MB'],
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
            'image' => Yii::t('app', 'Image'),
            'vedio' => Yii::t('app', 'Vedio'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AchievementsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AchievementsQuery(get_called_class());
    }
}
