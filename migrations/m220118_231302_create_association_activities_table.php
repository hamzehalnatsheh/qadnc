<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%association_activities}}`.
 */
class m220118_231302_create_association_activities_table extends Migration
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
        $this->createTable('{{%association_activities}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(500)->notNull(),
        ],$tableOptions);

        $data=[
            [
                'name'=>'لأبحاث والدراسات',
            ],
            [
                'name'=>'التوعية والتثقيف',
            ],
            [
                'name'=>'التأهيل والتدريب',
            ],
            [
                'name'=>'الفعاليات',
            ]
        ];

        Yii::$app->db
            ->createCommand()
            ->batchInsert('association_activities',
                [
                    'name',
                ], $data)
            ->execute();


    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%association_activities}}');
    }
}
