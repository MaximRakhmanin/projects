<?php

use yii\db\Schema;
use yii\db\Migration;

class m180129_143452_change_table_comment extends Migration
{
    public function up()
    {
        $this->addColumn('comment','user_id',Schema::TYPE_INTEGER);
        $this->addForeignKey('comment_user_key','comment','user_id','user','id');
    }

    public function down()
    {
        echo "m180129_143452_change_table_comment cannot be reverted.\n";

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
