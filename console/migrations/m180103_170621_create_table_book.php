<?php

use yii\db\Migration;

/**
 * Class m180103_170621_create_table_book
 */
class m180103_170621_create_table_book extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOption = null;
        if($this->db->driverName === 'mysql'){
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%book}}',
            [
                'id'=> $this->primaryKey(),
                'title'=> $this->string(100)->notNull(),
                'ISBN'=> $this->integer(),
                'publicationYear'=>$this->date(),
                'price'=> $this->integer()->notNull()->unsigned(),
                'condition'=>$this->integer(),
                'category_id'=> $this->integer()->notNull()
            ],$tableOption);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180103_170621_create_table_book cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180103_170621_create_table_book cannot be reverted.\n";

        return false;
    }
    */
}
