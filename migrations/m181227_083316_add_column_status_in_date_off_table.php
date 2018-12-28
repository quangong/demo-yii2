<?php

use yii\db\Migration;

/**
 * Class m181227_083316_add_column_status_in_date_off_table
 */
class m181227_083316_add_column_status_in_date_off_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('date-off', 'status', $this->boolean()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181227_083316_add_column_status_in_date_off_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181227_083316_add_column_status_in_date_off_table cannot be reverted.\n";

        return false;
    }
    */
}
