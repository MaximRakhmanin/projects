<?php

namespace rest\versions\v1\controllers;

use rest\override\BaseController;

class CategoryController extends BaseController
{
    public $modelClass = 'common\models\Category';


    public function behaviors(){

        $behaviors = parent::behaviors();

        $behaviors['authenticator']['only'] = ['create','index','view'];

        return $behaviors;
    }

}