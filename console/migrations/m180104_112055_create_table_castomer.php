<?php

use yii\db\Migration;

/**
 * Class m180104_112055_create_table_castomer
 */
class m180104_112055_create_table_castomer extends Migration
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
        $this->createTable('{{%customer}}',
            [
                'id'=> $this->primaryKey(),
                'firstName'=> $this->string(30)->notNull(),
                'lastName'=> $this->string(50)->notNull(),
                'streetNumber'=> $this->integer(),
                'streetName'=>$this->string(),
                'postalCode'=>$this->integer(),
                'province' => $this->string(),
                'country' => $this->string(),
                'phoneNumber' => $this->integer()
            ],$tableOption);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180104_112055_create_table_castomer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180104_112055_create_table_castomer cannot be reverted.\n";

        return false;
    }
    */
}
