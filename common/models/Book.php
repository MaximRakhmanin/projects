<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property int $ISBN
 * @property string $publicationYear
 * @property int $price
 * @property int $condition
 *
 * @property Author[] $authors
 * @property OrderItem[] $orderItems
 * @property Publisher[] $publishers
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['title', 'price'], 'required'],
            [['title','price','ISBN','publicationYear'],'trim'],
            ['price', 'integer'],
            ['publicationYear', 'default', 'value' => date('Y-m-d')],
            ['title', 'string', 'max' => 100],
            ['condition','integer'],
            ['ISBN','unique'],
            ['ISBN','match','pattern' => '/ISBN:([0-9]|-){13}/i'],
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
