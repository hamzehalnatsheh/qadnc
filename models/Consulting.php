<?php

namespace app\models;

use yii\base\Model;
use Yii;
/**
 * @property string $project_name
 *  @property string $specified_time
 *  @property string $communication
 * @property string $target
 *  @property string $about_project
 *
 *
 */

class Consulting extends Model
{
    public $project_name;
    public $specified_time;
    public $communication;
    public $target;
    public $about_project;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['project_name', 'specified_time', 'communication', 'target','about_project'], 'required'],

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



}