<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aboutus}}`.
 */
class m220118_231221_create_aboutus_table extends Migration
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

        $this->createTable('{{%aboutus}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(500)->notNull(),
            'body'=>$this->text()->notNull()
        ],$tableOptions);

        $data=[
            [  'title'=>'الجمعية التعاونية لتأهيل وتطوير الكوادر الوطنية'
                ,'body'=>'تعتبر الجمعية التعاونية إحدى المؤسسات التنموية التي تسهم في تحقيق التنمية المستدامة اقتصادياً واجتماعيا، على أساس تطوير وتنمية أفراد المجتمع المحلي في المجالات التقنية والمهنية والأغراض التنموية المتعددة.',

            ]
        ];

        Yii::$app->db
            ->createCommand()
            ->batchInsert('aboutus',
                [
                    'title',
                    'body',
                ], $data)
            ->execute();


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%aboutus}}');
    }
}
