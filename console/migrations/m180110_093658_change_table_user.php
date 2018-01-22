<?php

use yii\db\Migration;

/**
 * Class m180110_093658_change_table_user
 */
class m180110_093658_change_table_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('user','register_key',$this->string(32));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180110_093658_change_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180110_093658_change_table_user cannot be reverted.\n";

        return false;
    }
    */
}
