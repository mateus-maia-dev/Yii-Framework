<h1>Pessoas</h1>
<hr>

<ul>
    <?php foreach ($contatos1 as $contato) : ?>
        <li>
            <?= $contato->id . ' ' . $contato->nome . ' - ' . $contato->email ?><br>
            <small><?= $contato->cidade . ' - ' . $contato->estado ?></small>
        </li>
    <?php endforeach ?>
</ul>

<!-- nao entendi esse linha -->
<?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]);
