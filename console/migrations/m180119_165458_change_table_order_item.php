<?php

use yii\db\Migration;

/**
 * Class m180119_165458_change_table_order_item
 */
class m180119_165458_change_table_order_item extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('order_item','customer_id',$this->integer());
        $this->addForeignKey('order_item_customer','order_item','customer_id','customer','id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180119_165458_change_table_order_item cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180119_165458_change_table_order_item cannot be reverted.\n";

        return false;
    }
    */
}
