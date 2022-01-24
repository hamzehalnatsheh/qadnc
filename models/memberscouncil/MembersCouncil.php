<?php

namespace app\models\memberscouncil;

use Yii;

/**
 * This is the model class for table "{{%members_council}}".
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property string|null $image
 * @property string|null $general_definition
 * @property string|null $experiences
 * @property string|null $courses
 */
class MembersCouncil extends \yii\db\ActiveRecord
{
    public  $file;

    const Create="create";
    const Update='update';



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%members_council}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position','certificates'], 'required','on'=>[self::Create ,self::Update ]],
            [['general_definition', 'experiences', 'courses'], 'string','on'=>[self::Create ,self::Update ]],
            [['name'], 'string', 'max' => 256,'on'=>[self::Create ,self::Update ]],
            [['position'], 'string', 'max' => 500,'on'=>[self::Create ,self::Update ]],
            [['image'], 'string', 'max' => 255],
            ['file', 'required','on'=>[self::Create ,self::Update ]],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg','on'=>[self::Create ,self::Update  ]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'image' => Yii::t('app', 'Image'),
            'general_definition' => Yii::t('app', 'General Definition'),
            'experiences' => Yii::t('app', 'Experiences'),
            'courses' => Yii::t('app', 'Courses'),
            'file'=>Yii::t('app','File'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MembersCouncilQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MembersCouncilQuery(get_called_class());
    }
}
