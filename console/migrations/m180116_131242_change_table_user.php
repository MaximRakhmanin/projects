<?php

use yii\db\Migration;

/**
 * Class m180116_131242_change_table_user
 */
class m180116_131242_change_table_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('user','role',$this->integer()->defaultValue(10));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180116_131242_change_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180116_131242_change_table_user cannot be reverted.\n";

        return false;
    }
    */
}
