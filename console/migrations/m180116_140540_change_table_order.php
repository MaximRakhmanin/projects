<?php

use yii\db\Migration;

/**
 * Class m180116_140540_change_table_order
 */
class m180116_140540_change_table_order extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('order','status',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180116_140540_change_table_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180116_140540_change_table_order cannot be reverted.\n";

        return false;
    }
    */
}
