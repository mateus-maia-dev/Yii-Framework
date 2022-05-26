<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($nome, 'nome') ?>

<div class="form-group">
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>

<a href="http://virtualhost-aula1.com/contatos/read" class="btn btn-primary">Cancelar</a>