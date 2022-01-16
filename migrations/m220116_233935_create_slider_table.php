<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slider}}`.
 */
class m220116_233935_create_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(500),
            'image'=>$this->string(500),
            'body'=>$this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%slider}}');
    }
}
