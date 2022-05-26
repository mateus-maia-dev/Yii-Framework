<h1>Pessoas</h1>
<hr>

<ul>
    <?php foreach ($contatos1 as $contato) : ?>
        <li>
            <?= $contato->id . ' ' . $contato->nome . ' - ' . $contato->email ?> <br>
            <small><?= $contato->cidade . ' - ' . $contato->estado ?></small>
            <a href="http://virtualhost-aula1.com/contatos/delete?id=<?= $contato->id ?>" class="btn btn-danger">Excluir</a>
            <a href="http://virtualhost-aula1.com/contatos/update?id=<?= $contato->id ?>" class="btn btn-primary">Atualizar</a>

        </li>
    <?php endforeach ?>
</ul>

<!-- nao entendi esse linha -->
<?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]);
