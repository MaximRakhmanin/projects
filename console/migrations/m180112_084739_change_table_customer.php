<?php

use yii\db\Migration;

/**
 * Class m180112_084739_change_table_customer
 */
class m180112_084739_change_table_customer extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('customer','user_id',$this->integer());
        $this->addForeignKey('customer_user','customer','user_id','user','id');
        $this->addColumn('customer','sale',$this->integer());
        $this->addColumn('customer','status',$this->smallInteger()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180112_084739_change_table_customer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180112_084739_change_table_customer cannot be reverted.\n";

        return false;
    }
    */
}
