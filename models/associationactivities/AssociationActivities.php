<?php

namespace app\models\associationactivities;

use Yii;

/**
 * This is the model class for table "{{%association_activities}}".
 *
 * @property int $id
 * @property string $name
 */
class AssociationActivities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%association_activities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 500],
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
        ];
    }

    /**
     * {@inheritdoc}
     * @return AssociationActivitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssociationActivitiesQuery(get_called_class());
    }
}
