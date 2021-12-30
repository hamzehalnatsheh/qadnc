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
        $this->createTable('{{%achievements}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(1000),
            'body'=>'LONGTEXT',
            'image'=>$this->string(256),
            'vedio'=>$this->string(265),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%achievements}}');
    }
}
