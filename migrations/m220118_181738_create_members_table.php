<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%members}}`.
 */
class m220118_181738_create_members_table extends Migration
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


        $this->createTable('{{%members_council}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(256)->notNull(),
            'position'=>$this->string(500)->notNull(),
            'image'=>$this->string(255),
            'general_definition'=>$this->text(),
            'experiences'=>$this->text(),
            'courses'=>$this->text(255),
            'certificates'=>$this->text(255),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%members_council}}');
    }
}
