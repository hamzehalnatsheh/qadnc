<?php

namespace app\models;

use PHPUnit\Framework\Error\Error;
use Yii;
use yii\base\Model;
use app\models\User;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class EditProfile extends Model
{
   
    public $dateofbirth;
    public $email;
    public $file;
    public $first_name;
    public $last_name;
    public $experience;
    public $activities;
    public $qualifications;
    public $phone;
  
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        
            [['first_name','last_name','dateofbirth'], 'required'],
            ['dateofbirth', 'trim'],
            [['experience','activities','qualifications','phone'],'safe'],
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
            'username' => Yii::t('app', 'Username'),
            'first_name' => Yii::t('app', 'First_Name'),
            'last_name' => Yii::t('app', 'Last_Name'),
            'born_date' => Yii::t('app', 'Born_Date'),
            'auth_key' => Yii::t('app', 'Auth_Key'),
            'password_hash' => Yii::t('app', 'Password_Hash'),
            'password_reset_token' => Yii::t('app', 'Password_Reset_Token'),
            'email' => Yii::t('app', 'Email'),
            'dateofbirth' => Yii::t('app', 'Dateofbirth'),
            'verification_token' => Yii::t('app', 'Verification_Token'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
            'file' => Yii::t('app', 'Image'),
            'created_at' => Yii::t('app', 'Created_At'),
            'updated_at' => Yii::t('app', 'Updated_At'),
            'qualifications'=> Yii::t('app', 'Qualifications'),
            'experience' => Yii::t('app', 'Experience'),
            'activities'=> Yii::t('app', 'Activities'),
            'phone' => Yii::t('app', 'Phone'),
            
        ];
    }
}