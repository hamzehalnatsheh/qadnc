<?php

namespace app\models\courses;

use app\models\categories\Categories;
use Carbon\Carbon;
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
    const Active=1;
    const  DisActive=2;
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
            [[ 'title','description','start_at','end_at','category','status'], 'required'],
            [['description'], 'string'],
            [['start_at', 'end_at'], 'safe'],
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
            'start_at' => Yii::t('app', 'Start_At'),
            'end_at' => Yii::t('app', 'End_At'),
            'image' => Yii::t('app', 'Image'),
            'category' => Yii::t('app', 'Category'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created_At'),
            'update_at' => Yii::t('app', 'Update_At'),
            'deleted_at' => Yii::t('app', 'Deleted_At'),
            'file'=> Yii::t('app', 'File'),
        ];
    }




    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $today=Carbon::now("Asia/Amman");
        if (parent::beforeSave($insert)) {
            // Place your custom code here
            if ($this->isNewRecord) {
                $this->created_at = $today;
                $this->update_at = $today;
                $this->deleted_at = null;


            }

            return true;
        } else {
            return false;
        }
    }


    /**
     * @return int|null
     */
    public function getCategorytype()
    {
        return $this->hasOne(Categories::class,['id'=>'category']);
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
