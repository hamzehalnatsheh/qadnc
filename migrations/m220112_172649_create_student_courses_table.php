<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_courses}}`.
 */
class m220112_172649_create_student_courses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_courses}}', [
            'id' => $this->primaryKey(),
            'course_id'=>$this->integer(),
            'student_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student_courses}}');
    }
}
