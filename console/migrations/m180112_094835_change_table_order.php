<?php

use yii\db\Migration;

/**
 * Class m180112_094835_change_table_order
 */
class m180112_094835_change_table_order extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('order','orderDate',$this->timestamp());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180112_094835_change_table_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180112_094835_change_table_order cannot be reverted.\n";

        return false;
    }
    */
}
