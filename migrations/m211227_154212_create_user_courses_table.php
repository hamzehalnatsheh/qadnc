<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_courses}}`.
 */
class m211227_154212_create_user_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_courses}}', [
            'id' => $this->primaryKey(),
            'course_id'=>$this->integer()->unsigned()->notNull(),
            'user_id'=>$this->integer()->unsigned()->notNull(),
            'date_at'=>$this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_courses}}');
    }
}
