<?php

use yii\db\Migration;

/**
 * Class m180104_111919_create_table_order_item
 */
class m180104_111919_create_table_order_item extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOption = null;
        if($this->db->driverName === 'mysql') {
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%order_item}}',
            [
                'id'=> $this->primaryKey(),
                'quantity'=> $this->integer(),
                'price'=>$this->integer(),
                'book_id'=>$this->integer()->notNull()

            ],$tableOption);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180104_111919_create_table_order_item cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180104_111919_create_table_order_item cannot be reverted.\n";

        return false;
    }
    */
}
