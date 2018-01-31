<?php
namespace rest\versions\v1\controllers;

use common\models\Comment;
use rest\override\BaseController;



class CommentController extends BaseController
{
    public $modelClass = 'common\models\Comment';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = [];

        return $behaviors;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        $model = Comment::findOne(['user_id' => \Yii::$app->user->id]);

        var_dump($model);
        die;

    }

}
