<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%courses}}`.
 */
class m211225_192643_create_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%courses}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(1000),
            'description'=> 'LONGTEXT',
            'start_at'=>$this->dateTime(),
            'end_at'=>$this->dateTime(),
            'image'=>$this->string(256),
            'category'=>$this->integer(),
            'status'=>$this->smallInteger(),
            'created_at'=>$this->dateTime(),
            'update_at'=>$this->dateTime(),
            'deleted_at'=>$this->dateTime(),
            
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%courses}}');
    }
}
