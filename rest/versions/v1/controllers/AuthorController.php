<?php
/**
 * Created by PhpStorm.
 * User: mc10
 * Date: 04.01.18
 * Time: 17:47
 */

namespace rest\versions\v1\controllers;


use rest\override\BaseController;

class AuthorController extends BaseController
{
    public $modelClass = 'common\models\Author';
}