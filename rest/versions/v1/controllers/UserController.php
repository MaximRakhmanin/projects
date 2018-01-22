<?php
namespace rest\versions\v1\controllers;

use common\models\LoginForm;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\filters\auth\CompositeAuth;
use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\web\HttpException;
use yii\web\UnauthorizedHttpException;

/**
 * Class UserController
 * @package rest\versions\v1\controllers
 */
class UserController extends Controller
{

    /**
     * This method implemented to demonstrate the receipt of the token.
     * Do not use it on production systems.
     * @return string AuthKey or model with errors
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            return \Yii::$app->user->identity->getAuthKey();
        } else {
            return $model;
        }
    }


    public function behaviors()
    {
        return [

            TimestampBehavior::className()

        ];

    }

    public function actionRegister(){

        $user = new User();

        $user->username = \Yii::$app->request->post('username');
        $user->email = \Yii::$app->request->post('email');
        $user->setPassword(\Yii::$app->request->post('password'));
        $user->register_key = \Yii::$app->security->generateRandomString().'_'.time();
        if($user->save()){

//            \Yii::$app->mailer->compose()
//                ->setFrom([\Yii::$app->params['supportEmail'] => 'Test Mail'])
//                ->setTo($user->email)
//                ->setSubject('Message subject')
//                ->setTextBody('Plain text content')
//                ->setHtmlBody('<p>This is your registration key.</p><p>'.$user->register_key.'</p>')
//                ->send();

            return $user;
        }
        else{

            \Yii::$app->response->setStatusCode(401);

           // throw new HttpException(401,'Authentication failed');

            return $user->errors;
        }
    }
    public function actionValidate($token){

        if(User::isPasswordResetTokenValid($token)){

            return  'The working time of the new token is 1 hour';
        }


        $user = User::findOne(['register_key' => $token,'status'=> User::STATUS_WAIT]);

        if(isset($user)) {

            $user->register_key = null;
            $user->status = User::STATUS_ACTIVE;
            $user->generateAuthKey();
            $user->save();

            return $user;
        }
        else{

            return $user;
        }

    }

    public function actionPasswordReset(){

        $email = \Yii::$app->request->post('email');
        $user = User::findOne(['email' => $email]);

        if(isset($user)){

            $user->generatePasswordResetToken();
            $user->save();

//            \Yii::$app->mailer->compose()
//                ->setFrom([\Yii::$app->params['supportEmail'] => 'Test Mail'])
//                ->setTo($user->email)
//                ->setSubject('Message subject')
//                ->setTextBody('Plain text content')
//                ->setHtmlBody('<p>This is your reset password token.</p><p>'.$user->password_reset_token.'</p>')
//                ->send();

            return $user;
        }
        else{


        }
    }
    public function actionGenerateNewPassword($token){


        if(!User::isPasswordResetTokenValid($token)){

            return  'The working time of the new token is 1 hour';
        }

        if(isset($token)){

            $user = User::findByPasswordResetToken($token);

            $user->password_hash = \Yii::$app->security->generatePasswordHash(\Yii::$app->request->post('password-hash'));

            if($user->save()){

                $user->removePasswordResetToken();

                return $user;
            }
        }

    }

}
