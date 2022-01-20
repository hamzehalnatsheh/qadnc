<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contactus}}`.
 */
class m220118_231332_create_contactus_table extends Migration
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
        $this->createTable('{{%contactus}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(500)->notNull(),
            'address'=>$this->string(500)->notNull(),
            'email'=>$this->string(500)->notNull(),
            'phone'=>$this->string(200)->notNull(),
            'phone_number'=>$this->string(200)->notNull(),
            'facebook'=>$this->string(200)->notNull(),
            'instagram'=>$this->string(200)->notNull(),
            'twitter'=>$this->string(200)->notNull(),

        ],$tableOptions);

        $data=[
            [
                'title'=>'الجمعية التعاونية لتأهيل وتطوير الكوادر الوطنية',
                'address'=>'الرياض - حي المربع - طريق الملك سعود',
                'email'=>'info@qadnc.org.sa',
                'phone'=>'00966 509117025',
                'phone_number'=>'00966 112108640',
                'facebook'=>'facebook',
                'instagram'=>'instagram',
                'twitter'=>'twitter',
            ]
        ];

        Yii::$app->db
            ->createCommand()
            ->batchInsert('contactus',
                [
                    'title',
                    'address',
                    'email',
                    'phone',
                    'phone_number',
                    'facebook',
                    'instagram',
                    'twitter'
                ], $data)
            ->execute();


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contactus}}');
    }
}
