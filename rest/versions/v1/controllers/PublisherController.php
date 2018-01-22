<?php

namespace rest\versions\v1\controllers;


use rest\override\BaseController;
use yii\rest\ActiveController;

class PublisherController extends BaseController
{
    public $modelClass = 'common\models\Publisher';
}