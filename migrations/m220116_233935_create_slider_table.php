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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(500),
            'image'=>$this->string(500),
            'body'=>$this->text(),
        ],$tableOptions);



        $data=[
            [
                'title'=>'نقدم الإستشارات التسويقية',
                'image'=>'images/Roadmap-1.jpg',
                'body'=>'الدراسات - البحوث - الإحصاءات'
            ],
            [
                'title'=>'نقدم الإستشارات التسويقية',
                'image'=>'images/Roadmap.jpg',
                'body'=>'الدراسات - البحوث - الإحصاءات'
            ],
            [
                'title'=>'نقدم الإستشارات التسويقية',
                'image'=>'images/teamwork.jpg',
                'body'=>'الدراسات - البحوث - الإحصاءات'
            ]

            
        ];

        Yii::$app->db
            ->createCommand()
            ->batchInsert('slider',['title','image','body'], $data)->execute();




        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%slider}}');
    }
}
