<?php

use yii\db\Schema;
use yii\db\Migration;

class m180129_111220_change_table_book extends Migration
{
    public function up()
    {
        $this->addColumn('book','discount_price',Schema::TYPE_INTEGER);
    }

    public function down()
    {
        echo "m180129_111220_change_table_book cannot be reverted.\n";

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
