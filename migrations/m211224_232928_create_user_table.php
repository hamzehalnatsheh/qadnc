<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m211224_232928_create_user_table extends Migration
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

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'first_name'=>$this->string(100),
            'last_name'=>$this->string(100),
            'born_date'=>$this->date()->defaultValue(null),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'dateofbirth'=>$this->date()->defaultValue(null),
            'verification_token'=>$this->string()->defaultValue(null),
            'type'=>$this->smallInteger()->defaultValue(\app\models\User::Student),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'avatar'=>$this->string()->defaultValue(null),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);



        $data=[
            ['username'=>'admin',
                'first_name'=>'admin',
                'last_name'=>'admin',
                'email'=>'admin@admin.com',
                'type'=>\app\models\User::SUPER_ADMIN,
                'status'=>\app\models\User::STATUS_ACTIVE,
                'password_hash'=>Yii::$app->security->generatePasswordHash("admin"),
                'auth_key'=>'dddddddsdfewpdsfopjsofjsdof',
                'created_at'=>time(),
                'updated_at'=>time(),
            ]
        ];

        Yii::$app->db
            ->createCommand()
            ->batchInsert('user',
                [
                    'username',
                    'first_name',
                    'last_name',
                    'email',
                    'type',
                    'status',
                    'password_hash',
                    'auth_key',
                    'created_at',
                    'updated_at'
                ], $data)
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
