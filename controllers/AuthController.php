<?php
// controllers/AuthController.php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\User;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $request = Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');

        $user = User::findByUsername($username);

        if ($user && $user->validatePassword($password)) {
            $token = $this->generateJwtToken($user);
            return ['access_token' => $token];
        } else {
            Yii::$app->response->statusCode = 401;
            return ['error' => 'User or pass invalid.'];
        }
    }

    private function generateJwtToken($user)
    {
        $key = 'secret-key';
        $tokenId = base64_encode(random_bytes(32));
        $issuedAt = time();
        $expire = $issuedAt + 3600; 

        $token = [
            'iat'  => $issuedAt,
            'jti'  => $tokenId,
            'iss'  => 'library', 
            'nbf'  => $issuedAt - 10,
            'exp'  => $expire,
            'data' => [
                'userId'   => $user->id,
                'username' => $user->username,
            ],
        ];

        return JWT::encode($token, $key, 'HS256');
    }
}
