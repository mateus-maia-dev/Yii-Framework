<?php

namespace app\controllers;

use yii;
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

        // criação via post do formulário
        $post = Yii::$app->request->post();

        // verifica se houve algum post no formulário e se os campos da Model estão corretos
        // renderiza os campos para a confirmação
        if ($contato->load($post) && $contato->validate()) {
            // persistir esse contato no banco
            if ($contato->save()) {
                Yii::$app->session->setFlash('success', 'Contato criado com sucesso!');
            } else {
                Yii::$app->session->setFlash('danger', 'Ocorreu algum erro ao criar contato.');
            }

            return $this->render('/form-cadastro/formulario', [
                'model' => new Contatos()
            ]);
        }
        // Yii::$app->session->setFlash('danger', 'Dados inválidos.');

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

    public function actionUpdate($id)
    {
        $contato = Contatos::findOne(['id' => $id]);

        if (yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $contato->load($post);
            $contato->save();
        }

        return $this->render('/form-cadastro/atualiza-contato', [
            'nome' => $contato,

        ]);
    }

    public function actionDelete($id)
    {
        // chamada direta da Model
        if (($contato = Contatos::findOne(['id' => $id])) !== null) {
            if ($contato->delete()) {
                Yii::$app->session->setFlash('success', 'Deletado com sucesso!');
            } else {
                Yii::$app->session->setFlash('danger', 'Erro ao deletar o contato');
            }
        } else {
            Yii::$app->session->setFlash('danger', 'Registro não encontrado.');
        }
        return $this->redirect('/contatos/read');
    }
}
