<?php
/**
 * Created by PhpStorm.
 * User: mc10
 * Date: 04.01.18
 * Time: 17:48
 */

namespace rest\versions\v1\controllers;


use rest\override\BaseController;


class Order_itemController extends BaseController
{
    public $modelClass = 'common\models\Order_item';
}