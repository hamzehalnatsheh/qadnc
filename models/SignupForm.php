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
class SignupForm extends Model
{
    public $username;
    public $dateofbirth;
    public $email;
    public $password;
    public $password_repeat;
    public $file;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // ['username', 'trim'],
            // ['username', 'required'],
            // ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            // ['username', 'string', 'min' => 2, 'max' => 255],
            ['dateofbirth', 'trim'],
            [['dateofbirth','password_repeat'],'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            [['file'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,gif'],
        ];
    }


    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $newId = User::find()->max('id') + 1;
        $this->file = UploadedFile::getInstance($this, 'file');

        if (!is_null( $this->file)) {
            FileHelper::createDirectory("uploads/avatar/$newId");
          $path="uploads/avatar/$newId/index" . "." .  $this->file->extension;
          $this->file->saveAs($path);
          $this->avatar=$path;
        }

        $user = new User();
        $user->username = $this->username;
        $user->dateofbirth = $this->dateofbirth;
        $user->email = $this->email;
        $user->status=\app\models\User::STATUS_ACTIVE;
        $user->type=\app\models\User::Student;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return ($user->save() && $this->sendEmail($user))? Yii::$app->user->login($user, false ? 3600 * 24 * 30 : 0):false;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return  true;
        try {
            return Yii::$app
                ->mailer
                ->compose(
                    ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                    ['user' => $user]
                )
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                ->setTo($this->email)
                ->setSubject('Account registration at ' . Yii::$app->name)
                ->send();
        }catch (Error $error){
            return  true;
        }

    }
}