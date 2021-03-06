<?php

namespace common\models;


/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $book_id
 * @property string $created_at
 *
 * @property Book $book
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id','user_id','content'], 'required'],
            [['book_id'], 'integer'],
            [['created_at'], 'safe'],
            [['content'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'book_id' => 'Book ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    public function getUser(){

        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
