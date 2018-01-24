<?php

namespace common\models;


class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 255,'min' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }
    public function getBooks(){

        return $this->hasMany(Book::className(),['category_id' => 'id']);
    }

    public function fields(){

        $fields = parent::fields();

        $fields[] = 'books';

        return $fields;

    }

    public function beforeSave($insert)
    {


        return parent::beforeSave($insert);
    }

}
