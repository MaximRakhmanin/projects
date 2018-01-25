<?php

use yii\db\Schema;
use yii\db\Migration;

class m180124_165144_change_table_order extends Migration
{
    public function up()
    {
        $this->addColumn('order_item','order_id',Schema::TYPE_INTEGER );
        $this->addForeignKey('order_item_order_key','order_item','order_id','order','id');
    }

    public function down()
    {
        echo "m180124_165144_change_table_order cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
