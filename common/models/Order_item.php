<?php

namespace common\models;

class Order_item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantity', 'book_id','customer_id','price'], 'integer'],
            [['book_id','customer_id','price','quantity'], 'required'],
            [['price','quantity'],'trim'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    public function getCustomer(){

        return $this->hasOne(Customer::className(),['id' => 'customer_id']);
    }

    public function getOrder(){

        return $this->hasOne(Order::className(),['order_id' => 'id']);
    }


    public function fields()
    {
       $fields = parent::fields();

       $fields[] = 'book';

       return $fields;
    }
}
