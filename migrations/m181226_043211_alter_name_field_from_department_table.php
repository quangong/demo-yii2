<?php

use yii\db\Migration;

/**
 * Class m181226_043211_alter_name_field_from_department_table
 */
class m181226_043211_alter_name_field_from_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('department', 'name', $this->string()->notNull()->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181226_043211_alter_name_field_from_department_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181226_043211_alter_name_field_from_department_table cannot be reverted.\n";

        return false;
    }
    */
}
