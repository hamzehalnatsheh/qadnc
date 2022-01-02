<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consultation}}`.
 */
class m220102_223652_create_consultation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%consultation}}', [
            'id' => $this->primaryKey(),
            'project_name'=>$this->string(255),
            'specified_time'=>$this->string(255),
            'communication'=>$this->string(255),
            'target'=>$this->text(),
            'about_project'=>$this->text(),
        ]);
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
     */
    public function safeDown()
    {
        $this->dropTable('{{%consultation}}');
    }
}
