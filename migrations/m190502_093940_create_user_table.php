<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190502_093940_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(16)->notNull(),
            'password' => $this->string(256)->notNull(),
            'role' => $this->string(32)->defaultValue('user'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);


        $time = time();

        
        $data[] = ['login' => 'user', 'password' => 'user', 'role' => 'user', 'created_at' => $time, 'updated_at' => $time];
        $data[] = ['login' => 'admin', 'password' => 'admin', 'role' => 'admin', 'created_at' => $time, 'updated_at' => $time];
        
        $column_name=['login', 'password', 'role', 'created_at', 'updated_at'];

        $insert_count = Yii::$app->db->createCommand()
                                    ->batchInsert(
                                        'user', $column_name, $data
                                    )
                                    ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
