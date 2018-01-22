<?php

use yii\db\Migration;

/**
 * Class m180119_105741_change_table_order
 */
class m180119_105741_change_table_order extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('order','customer_id',$this->integer());
        $this->addForeignKey('customer_order','order','customer_id','customer','id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180119_105741_change_table_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180119_105741_change_table_order cannot be reverted.\n";

        return false;
    }
    */
}
