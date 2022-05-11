<!-- função com o encode gera uma segurança contra XSS -->
<h2>O valor da variável $message é: <?= \yii\helpers\Html::encode($message) ?></h2>