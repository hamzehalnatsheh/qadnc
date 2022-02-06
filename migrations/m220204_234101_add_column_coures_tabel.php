<?php

use yii\db\Migration;

/**
 * Class m220204_234101_add_column_coures_tabel
 */
class m220204_234101_add_column_coures_tabel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('courses','start_time',$this->time()->defaultValue(null));
        $this->addColumn('courses','end_time',$this->time()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220204_234101_add_column_coures_tabel cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220204_234101_add_column_coures_tabel cannot be reverted.\n";

        return false;
    }
    */
}
