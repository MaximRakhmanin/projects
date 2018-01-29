<?php
namespace rest\versions\v1\controllers;

use common\models\Book;
use rest\override\BaseController;
use common\models\User;

class BookController extends BaseController
{
    public $modelClass = 'common\models\Book';

    public function behaviors(){

        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = [];

        return $behaviors;
    }

    public function actionCreateBook(){

        $user = \Yii::$app->user->identity;

        if($user->role == User::ROLE_ADMIN){

            $book = new book();
            $book->setAttributes(\Yii::$app->request->post());
            $book->save();

            if($book->discount != null){

                $time = strtotime(date('Y-m-d'));
                $time = strtotime("+ 14 day",$time);
                $out = date('Y-m-d', $time);
                $book->date = $out;
                $book->status = Book::STATUS_ACTIVE;
                $book->save();

                $this->timer($book->id);
            }
            return $book;
        }

    }

    public function actionActivityDiscount(){

        $user = \Yii::$app->user->identity;

        if($user->role == User::ROLE_ADMIN){

            $book = $this->timer(\Yii::$app->request->post('book_id'),\Yii::$app->request->post('timeout'));

            return $book;

        }
    }
    public function timer($book_id,$timeout = null){

        $book = Book::findOne(['id' => $book_id]);

        if(isset($book)){

            if($book->status == Book::STATUS_ACTIVE || $book->discount > 0){

                if($timeout != null){

                    $time = strtotime(date('Y-m-d'));
                    $time = strtotime("+".$timeout."day",$time);
                    $out = date('Y-m-d', $time);
                    $book->date = $out;
                    $book->save();
                }
//
                if(date('Y-m-d') === $book->date ){

                    $book->status = Book::STATUS_DELETE;
                    $book->discount = null;
                    $book->save();

                    return $book;
                }
            }
        }
            return $book;
    }

}
