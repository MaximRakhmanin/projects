<?php
namespace rest\versions\v1\controllers;

use rest\override\BaseController;

class BookController extends BaseController
{
    public $modelClass = 'common\models\Book';

    public function behaviors(){

        $behaviors = parent::behaviors();

        $behaviors['authenticator']['only'] = ['create'];

        return $behaviors;
    }

}
