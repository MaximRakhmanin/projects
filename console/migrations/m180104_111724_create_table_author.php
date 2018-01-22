<?php

use yii\db\Migration;

/**
 * Class m180104_111724_create_table_author
 */
class m180104_111724_create_table_author extends Migration
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

        $this->createTable('{{%author}}',
            [
                'id' => $this->primaryKey(),
                'firstName' => $this->string(30),
                'lastName' => $this->string(50),
                'book_id'=> $this->integer()->notNull()
            ],$tableOption);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180104_111724_create_table_author cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180104_111724_create_table_author cannot be reverted.\n";

        return false;
    }
    */
}
