<?php

namespace rest\versions\v1\controllers;

use common\models\Customer;
use common\models\User;
use rest\override\BaseController;

class CustomerController extends BaseController
{
    public $modelClass = 'common\models\Customer';

    public function behaviors(){

        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = [];

        return $behaviors;
    }

    public function actionDiscount(){

        $user = User::findOne(['id' => \Yii::$app->user->id]);
        $customer = Customer::findOne(['id' => \Yii::$app->request->post('customer_id')]);

        if($user->role == User::ROLE_ADMIN){

            $customer->status = Customer::STATUS_SALE_ACTIVE;
            $customer->sale = \Yii::$app->request->post('discount');
            $customer->save();

        }
        return $customer;
    }

}