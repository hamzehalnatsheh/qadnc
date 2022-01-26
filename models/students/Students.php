<?php

namespace app\models\students;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $born_date
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $dateofbirth
 * @property string|null $verification_token
 * @property int|null $type
 * @property int $status
 * @property string|null $avatar
 * @property int $created_at
 * @property int $updated_at
 */
class Students extends \yii\db\ActiveRecord
{
    public $file;
    const Create="create";
    const Update='update';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'dateofbirth', 'email','first_name','last_name'], 'required','on'=>[self::Create ,self::Update ]],
            [['born_date', 'dateofbirth'], 'safe','on'=>[self::Create ,self::Update ]],
            [['first_name', 'last_name'], 'string', 'max' => 100 ,'on'=>[self::Create ,self::Update ]],
            [['username'], 'unique','on'=>[self::Create ,self::Update ]],
            [['email'], 'unique','on'=>[self::Create ,self::Update ]],
            ['avatar','safe','on'=>[self::Create ,self::Update ]],
            ['file','required','on'=>[self::Create ]],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,gif','on'=>[self::Create ,self::Update ]],
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
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

}
