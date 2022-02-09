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
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 1000],
            [['vedio'], 'string', 'max' => 265],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,gif'],        
            // [['vedio'], 'one_input'],
            // [['vedio'],'my_required'],
            // ['vedio', function ($attribute,$model) {
            //     dd('ddd');
            //     if (empty($model->vedio)) {
        
            //         $this->addError($attribute, 'Form must contain a file or message.');
        
            //     }
        
            // }],
        
        ];
    }



    public function my_required($attribute_name, $params){

        if (empty($this->vedio)) {
            $this->addError($attribute_name, Yii::t('user', 'At least 1 of the field must be filled up properly'));
            return false;
        }
        return true;
    }


    public function one_input($attribute, $params, $validator)
    {
        var_dump( isset($this->$attribute));
        exit;
        if (! isset($this->$attribute) &&  !isset($this->vedio) ) {
            $this->addError($attribute, 'اضافة صوره او رابط يوتيوب');
        }
        if (isset($this->$attribute) && isset($this->vedio) ) {
            $this->addError($attribute, 'اضافة صوره او رابط يوتيوب');
        }
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
            'vedio' => Yii::t('app', 'YouTube'),
            'file'=>Yii::t('app','Image'),
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
