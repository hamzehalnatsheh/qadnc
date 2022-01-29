<?php

namespace app\models;

use PHPUnit\Framework\Error\Error;
use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupFormMember extends Model
{
    public $username;
    public $dateofbirth;
    public $email;
    public $password;
    public $password_repeat;
    public $activities;
    public $qualifications;
    public $experience;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['dateofbirth', 'trim'],
            [['dateofbirth','password_repeat'],'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['activities','qualifications','experience','phone'],'string'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
        
            
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

        $user = new User();
        $user->username = $this->username;
        $user->dateofbirth = $this->dateofbirth;
        $user->email = $this->email;
        $user->status=\app\models\User::STATUS_ACTIVE;
        $user->type=\app\models\User::Memmber;
        $user->experience = $this->experience;
        $user->activities = $this->activities;
        $user->qualifications = $this->qualifications;   
        $user->phone= $this->phone;   
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