<?php

namespace rest\versions\v1\controllers;

use rest\override\BaseController;

class CustomerController extends BaseController
{
    public $modelClass = 'common\models\Customer';

    public function behaviors(){

        $behaviors = parent::behaviors();

        $behaviors['authenticator']['only'] = ["view",'create'];

        return $behaviors;
    }

}