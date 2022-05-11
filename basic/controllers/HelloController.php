<?php
//O controller vai servir para direcionar uma ação(action)

namespace app\controllers;

use yii\web\Controller;

class HelloController extends Controller
{
    // action
    public function actionDigaHello($message = 'Hello')
    {

        // para renderizar alguma coisa nessa action
        // array de parametros, para enviar algo para a view
        // o nome da view e da action por convensão é o mesmo
        return $this->render('diga-hello', [
            'message' => $message
        ]);
    }
}
