<h2>Formulário Cadastro de Contatos</h2>
<hr>

<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<!-- abre o formulario e insere o nome em cada campo -->
<!-- importante é saber que o nome do campo deve ser igual ao nome na Model -->
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'nome') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'cidade') ?>
<?= $form->field($model, 'estado') ?>

<!-- cria um botao na tela -->
<div class="form-group">
    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
</div>


<!-- fecha o formulario -->
<?php ActiveForm::end() ?>