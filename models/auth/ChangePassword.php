<?php

namespace app\models\auth;

use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class ChangePassword extends Model
{
    public $old_password;
    public $new_password;
    public $confirm_pass;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['old_password', 'new_password', 'confirm_pass'], 'required'],
            [['old_password'], 'isOld'],
            [['new_password'], 'string', 'min' => 6],
            ['confirm_pass', 'compare', 'compareAttribute' => 'new_password', 'message' => Yii::t('app', 'Pass_Dont_match')],
        ];
    }

    public function isOld($attribute)
    {
        if (!Yii::$app->security->validatePassword($this->$attribute, Yii::$app->user->identity->password_hash)) {
            $this->addError($attribute, Yii::t('app', 'Is_Not_Old'));
        }
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'old_password' => Yii::t('app', 'Old_Password'),
            'new_password' => Yii::t('app', 'New_Password'),
            'confirm_pass' => Yii::t('app', 'Confirm_Pass'),

        ];
    }
}