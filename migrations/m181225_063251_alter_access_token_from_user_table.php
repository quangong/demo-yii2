<?php

use yii\db\Migration;

/**
 * Class m181225_063251_alter_access_token_from_user_table
 */
class m181225_063251_alter_access_token_from_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'authKey', $this->string()->notNull());
        $this->alterColumn('user', 'accessToken', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181225_063251_alter_access_token_from_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181225_063251_alter_access_token_from_user_table cannot be reverted.\n";

        return false;
    }
    */
}
