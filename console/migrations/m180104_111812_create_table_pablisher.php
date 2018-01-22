<?php

use yii\db\Migration;

/**
 * Class m180104_111812_create_table_pablisher
 */
class m180104_111812_create_table_pablisher extends Migration
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
            $this->createTable('{{%publisher}}',
                [
                    'id'=> $this->primaryKey(),
                    'publisherName'=> $this->string()->notNull(),
                    'address'=> $this->string(),
                    'city'=>$this->string(),
                    'country'=>$this->string(),
                    'phoneNumber'=>$this->integer(),
                    'book_id'=> $this->integer()->notNull()
                ],$tableOption);



    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180104_111812_create_table_pablisher cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180104_111812_create_table_pablisher cannot be reverted.\n";

        return false;
    }
    */
}
