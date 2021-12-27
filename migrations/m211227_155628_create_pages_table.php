<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 */
class m211227_155628_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(1000),
            'body'=>'LONGTEXT',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
