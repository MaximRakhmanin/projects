<?php

namespace rest\versions\v1\controllers;

use common\models\Customer;
use common\models\Order;
use common\models\Order_item;
use common\models\User;
use rest\override\BaseController;
use yii\web\HttpException;


class OrderController extends BaseController
{
    public $modelClass = 'common\models\Order';

    public function behaviors(){

        $behaviors = parent::behaviors();

        $behaviors['authenticator']['only'] = ['purchase','update-status'];

        return $behaviors;
    }


    public function actionPurchase(){

        $customer = Customer::findOne(['user_id' => \Yii::$app->user->id]);
        $total = [];
        foreach(\Yii::$app->request->post('books') as $item){

            $order_item = new Order_item();
            $order_item->setAttributes($item);
            $order_item->customer_id = $customer->id;
            $order_item->save();
            $total[] = $item['price'];
        }

        if($customer->status == Customer::STATUS_SALE_ACTIVE){

            $order = new Order();
            $order->user_id = \Yii::$app->user->id;
            $order->total_amount = array_sum($total);
            $order->subtotal = $order->total_amount * $customer->sale /100;
            $order->save();

            return $order;
        }
        else {
            $order = new Order();
            $order->user_id = \Yii::$app->user->id;
            $order->total_amount = array_sum($total);
            $order->subtotal = $order->total_amount;
            $order->customer_id = $customer->id;
            $order->save();

            return $order;
        }
    }
    public function actionUpdateStatus(){

        $role = \Yii::$app->user->identity->role;
        if($role == User::ROLE_ADMIN){

            $user_id = \Yii::$app->request->post('user_id');
            $order = Order::findOne(['user_id' => $user_id]);
            $order->status = Order::STATUS_DELETE;
            $order->save();

            return $order;
        }
        else{
            throw new HttpException(403,'No access to the specified action');
        }

    }

    public function beforeAction($action)
    {

        $customer = Customer::findOne(['user_id' => \Yii::$app->user->id]);       //
        $counter = [];
        foreach($customer->orders as $order){
            $counter[] = $order->total_amount;
        }

        if(array_sum($counter) >= 50000){

            if($customer->status == Customer::STATUS_SALE_DELETED){

                $customer->status = Customer::STATUS_SALE_ACTIVE;
                $customer->save();
            }
            if($customer->sale < 5){

                $customer->sale = 5;
                $customer->save();
            }
        }
        return parent::beforeAction($action);
    }

}