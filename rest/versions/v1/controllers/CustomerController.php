<?php

namespace rest\versions\v1\controllers;

use common\models\Customer;
use rest\override\BaseController;

class CustomerController extends BaseController
{
    public $modelClass = 'common\models\Customer';

    public function behaviors(){

        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = ['addition',"view",'create'];

        return $behaviors;
    }


    public function actionAddition(){

        $customer = new Customer();        //Customer::findOne(['user_id' => \Yii::$app->user->id]);
        $customer->user_id = \Yii::$app->user->id;
        $customer-> setAttributes(\Yii::$app->request->post());
        $customer->save();

        return $customer;

    }


}