<?php

use yii\db\Migration;

/**
 * Class m180115_100515_change_table_order
 */
class m180115_100515_change_table_order extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('order','user_id',$this->integer());
        $this->addForeignKey('order_user_key','order','user_id','user','id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180115_100515_change_table_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180115_100515_change_table_order cannot be reverted.\n";

        return false;
    }
    */
}
