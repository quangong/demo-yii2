<?php

use yii\db\Migration;

/**
 * Handles the creation of table `date_off`.
 */
class m181225_023856_create_date_off_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('date_off', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'date_create' => $this->date()->notNull(),
            'date_end' => $this->date()->notNull()
        ]);

        // add foreign key for table `date_off`
        $this->addForeignKey(
            'fk-date_off_user_id',
            'date_off',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('date_off');
    }
}
