<?php

namespace rest\versions\v1\controllers;

use common\models\Rating;
use rest\override\BaseController;

class RatingController extends BaseController
{
    public $modelClass = 'common\models\Rating';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except'] = [];

        return $behaviors;
    }

   public function checkAccess($action, $model = null, $params = [])
   {
       if($action === 'create') {

           $model = Rating::findOne(['user_id' => \Yii::$app->user->id]);
           if ($model != null) {
               if ($model->user_id == \Yii::$app->user->id) {

                   throw new \yii\web\ForbiddenHttpException(sprintf('You have already rated', $action));
               }
           }
       }
   }


}