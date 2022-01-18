<?php

namespace app\models\contactus;

use Yii;

/**
 * This is the model class for table "{{%contactus}}".
 *
 * @property int $id
 * @property string $title
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $phone_number
 */
class Contactus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contactus}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'address', 'email', 'phone', 'phone_number'], 'required'],
            [['title', 'address', 'email'], 'string', 'max' => 500],
            [['phone', 'phone_number'], 'string', 'max' => 200],
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
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'phone_number' => Yii::t('app', 'Phone Number'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContactusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactusQuery(get_called_class());
    }
}
