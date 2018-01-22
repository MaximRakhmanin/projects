<?php

namespace common\models;


class Publisher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publisher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publisherName', 'book_id'], 'required'],
            [['publisherName','phoneNumber','address','city','country'],'trim'],
            [['phoneNumber', 'book_id'], 'integer'],
            [['publisherName', 'address', 'city', 'country'], 'string', 'max' => 255,'min'=> 3],
            ['phoneNumber','match','pattern'=> '^\+[-0-9]{10,12}$'],
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
            'publisherName' => 'Publisher Name',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'phoneNumber' => 'Phone Number',
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

    public function fields()
    {
        $fields = parent::fields();

        $fields[] = 'book';

        return $fields;
    }
}
