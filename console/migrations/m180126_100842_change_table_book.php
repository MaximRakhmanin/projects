<?php

use yii\db\Schema;
use yii\db\Migration;

class m180126_100842_change_table_book extends Migration
{
    public function up()
    {
        $this->addColumn('book','discount',Schema::TYPE_SMALLINT);
        $this->addColumn('book','status',Schema::TYPE_SMALLINT);
        $this->addColumn('book','date',Schema::TYPE_TIMESTAMP);
    }

    public function down()
    {
        echo "m180126_100842_change_table_book cannot be reverted.\n";

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
