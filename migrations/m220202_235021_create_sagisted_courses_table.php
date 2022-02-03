<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sagisted_courses}}`.
 */
class m220202_235021_create_sagisted_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sagisted_courses}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'body'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sagisted_courses}}');
    }
}
