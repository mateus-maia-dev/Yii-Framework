<?php

namespace app\controllers;

use app\models\Contatos;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ContatosController extends Controller
{
    public function actionCreate()
    {

        // instanciar a Model
        $contato = new Contatos();

        // criar um contato
        $contato->nome = 'Mateus';
        $contato->email = 'mateus@mail.com';

        // persistir esse contato no banco
        $contato->save();

        return $this->render('/form-cadastro/formulario', [
            'model' => $contato
        ]);
    }




    public function actionRead()
    {
        // trazer todas as pessoas cadastradas no banco
        $contatos = Contatos::find()->all();

        // paginação
        $query = Contatos::find();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count()
        ]);

        $contatos = $query->orderBy('nome')->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // reenderização na página
        return $this->render('/form-cadastro/contatos', [
            'contatos1' => $contatos,
            'pagination' => $pagination
        ]);
    }

    public function actionUpdate($id, $novo_nome)
    {
        // if(($contato = Contatos::findOne(['id' => $id])) !== null && $novo_nome !== null) {
        //     $contato->nome = $novo_nome;

        //     return $this->render('')
        // }
    }

    public function actionDelete($id)
    {
        // chamada direta da Model
        if (($contato = Contatos::findOne(['id' => $id])) !== null) {
            $contato->delete();

            return $this->render('/form-cadastro/form-confirmacao', [
                'contato' => $contato
            ]);
        }

        throw new NotFoundHttpException('O contato não existe!');
    }
}
