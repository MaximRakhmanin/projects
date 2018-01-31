<?php

use yii\db\Schema;
use yii\db\Migration;

class m180131_113307_create_table_rating extends Migration
{
    public function up()
    {
        $tableOption = null;
        if($this->db->driverName === 'mysql'){
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%rating}}',
            [
                'id'=> Schema::TYPE_PK,
                'user_id'=> Schema::TYPE_INTEGER,
                'book_id'=> Schema::TYPE_INTEGER,
                'rating'=> Schema::TYPE_INTEGER,

            ],$tableOption);

            $this->addForeignKey('user_rating_key','rating','user_id','user','id');
            $this->addForeignKey('book_rating_key','rating','book_id','book','id');
    }

    public function down()
    {
        echo "m180131_113307_create_table_rating cannot be reverted.\n";

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
