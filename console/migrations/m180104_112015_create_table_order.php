<?php

use yii\db\Migration;

/**
 * Class m180104_112015_create_table_order
 */
class m180104_112015_create_table_order extends Migration
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
        $this->createTable('{{%order}}',
            [
                'id'=> $this->primaryKey(),
                'subtotal'=> $this->integer(),
                'total_amount' => $this->integer(),
    ],$tableOption);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180104_112015_create_table_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180104_112015_create_table_order cannot be reverted.\n";

        return false;
    }
    */
}
