<?php

namespace app\models\achievements;

use app\components\AchievementValidator;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\web\UploadedFile;

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
    const Create="create";
    const Update='update';
 
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
            [['title', 'body'], 'required','on'=>[self::Create ,self::Update ]],
            [['body'], 'string','on'=>[self::Create ,self::Update ]],
            [['title'], 'string', 'max' => 1000,'on'=>[self::Create ,self::Update ]],
            [['vedio'], 'string', 'max' => 265,'on'=>[self::Create ,self::Update ]],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,gif','on'=>[self::Create ,self::Update ]]    
        ];
    }



    public function afterValidate()
    {
        if (parent::beforeValidate()) {
            $this->file = UploadedFile::getInstance($this, 'file');
            if($this->scenario == self::Create){

                if(empty($this->vedio) &&  (empty($this->file) == true)){
                    $this->addError('file', 'يجب عليك اضافة رابط يوتيوب او صوره'); 
                    return false;
                }elseif(isset($this->vedio) &&  (empty($this->file) == false)){
                    $this->addError('file', 'يجب عليك اضافة رابط يوتيوب او صوره'); 
                    return false;
                }elseif(isset($this->vedio) &&  (empty($this->file) == true)){
                 
                    if (!preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $this->vedio, $match)) {
                        $this->addError('vedio', 'الرابط غير صحيح'); 
                        return false;
                    }
                }
            }
           

            return true;
        }

        return false;
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
