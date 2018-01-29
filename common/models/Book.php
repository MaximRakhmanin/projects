<?php

namespace common\models;

class Book extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 0;

    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['title', 'price','category_id'], 'required'],
            [['title','price','ISBN'],'trim'],
            ['price', 'integer'],
            ['publicationYear', 'default', 'value' => date('Y-m-d')],
            ['title', 'string', 'max' => 100],
            ['condition','in','range' => [self::STATUS_ACTIVE,self::STATUS_DELETE]],
            ['condition','default','value' => self::STATUS_ACTIVE],
            ['ISBN','unique'],
            ['ISBN','match','pattern' => '/ISBN:([0-9]|-){13}/i'],
            ['discount','integer'],
            ['status','in','range' => [self::STATUS_ACTIVE,self::STATUS_DELETE]],
            ['status','default', 'value' => self::STATUS_DELETE],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'ISBN' => 'Isbn',
            'publicationYear' => 'Publication Year',
            'price' => 'Price',
            'condition' => 'Condition',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder_Items()
    {
        return $this->hasMany(Order_Item::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublishers()
    {
        return $this->hasMany(Publisher::className(), ['book_id' => 'id']);
    }


    public function getCategory(){

        return $this->hasOne(Category::className(),['id' => 'category_id']);
    }

}
