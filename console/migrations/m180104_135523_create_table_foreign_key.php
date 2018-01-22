<?php

use yii\db\Migration;

/**
 * Class m180104_135523_create_table_foreign_key
 */
class m180104_135523_create_table_foreign_key extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addForeignKey('publisher_book_key','publisher','book_id','book','id');
        $this->addForeignKey('author_book_key','author','book_id','book','id');
        $this->addForeignKey('order_item_book_key','order_item','book_id','book','id');
        $this->addForeignKey('book_category_keys','book','category_id','category','id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180104_135523_create_table_foreign_key cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180104_135523_create_table_foreign_key cannot be reverted.\n";

        return false;
    }
    */
}
