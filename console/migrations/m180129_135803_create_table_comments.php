<?php

use yii\db\Schema;
use yii\db\Migration;

class m180129_135803_create_table_comments extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%comment}}',
            [
                'id' => Schema::TYPE_PK,
                'content' => Schema::TYPE_STRING ,
                'book_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'created_at' => Schema::TYPE_TIMESTAMP
            ],
            $tableOptions
        );
        $this->addForeignKey('comment_book_key','comment','book_id','book','id');
    }

    public function down()
    {
        echo "m180129_135803_create_table_comments cannot be reverted.\n";

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
