<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%achievements}}`.
 */
class m211230_102806_create_achievements_table extends Migration
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

        $this->createTable('{{%achievements}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(1000),
            'body'=>'LONGTEXT',
            'image'=>$this->string(256),
            'vedio'=>$this->string(265),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%achievements}}');
    }
}
