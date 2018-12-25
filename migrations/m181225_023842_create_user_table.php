<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181225_023842_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(20)->notNull()->unique(),
            'password' => $this->string(20)->notNull(),
            'authKey' => $this->string(20)->notNull(),
            'accessToken' => $this->string(20)->notNull(),
            'id_department' => $this->integer()->notNull(),
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_department_id',
            'user',
            'id_department',
            'department',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
