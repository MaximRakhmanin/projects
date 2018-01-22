<?php
namespace rest\versions\v1\controllers;

use rest\override\BaseController;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class CommentController extends BaseController
{
    public $modelClass = 'common\models\Comment';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }
}
