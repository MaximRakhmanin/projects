<?php

use yii\db\Migration;

/**
 * Class m180103_171118_create_table_category
 */
class m180103_171118_create_table_category extends Migration
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
        $this->createTable('{{%category}}',
        [
            'id'=> $this->primaryKey(),
            'description'=> $this->string()->notNull()
        ],$tableOption );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180103_171118_create_table_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180103_171118_create_table_category cannot be reverted.\n";

        return false;
    }
    */
}
