<?php

namespace app\models\students;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $verification_token
 * @property int|null $type
 * @property int $status
 * @property date born_date
 * @property int $created_at
 * @property int $updated_at
 */
class Members extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['type', 'status'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['born_date','self'],
            [['password_reset_token'], 'unique'],
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
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
            'born_date'=>Yii::t('app','Born_Date'),
            'created_at' => Yii::t('app', 'Created_At'),
            'updated_at' => Yii::t('app', 'Updated_At'),
            'file'=>Yii::t('app','File'),
        ];
    }


    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
//        $today=Carbon::now("Asia/Amman");
//        if (parent::beforeSave($insert)) {
//            // Place your custom code here
//            if ($this->isNewRecord) {
//                $this->created_at = $today;
//                $this->updated_at = $today;
//
//
//            } else {
//                $this->updated_at =$today;
//            }
//
//            return true;
//        } else {
//            return false;
//        }
    }
    /**
     * {@inheritdoc}
     * @return MembersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MembersQuery(get_called_class());
    }
}
