<?php

namespace app\models\consultation;

use Yii;

/**
 * This is the model class for table "{{%consultation}}".
 *
 * @property int $id
 * @property string|null $project_name
 * @property string|null $specified_time
 * @property string|null $communication
 * @property string|null $target
 * @property string|null $about_project
 */
class Consultation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%consultation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['target', 'about_project'], 'string'],
            [['project_name', 'specified_time', 'communication'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_name' => Yii::t('app', 'Project_Name'),
            'specified_time' => Yii::t('app', 'Specified_Time'),
            'communication' => Yii::t('app', 'Communication'),
            'target' => Yii::t('app', 'Target'),
            'about_project' => Yii::t('app', 'About_Project'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ConsultationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConsultationQuery(get_called_class());
    }
}
