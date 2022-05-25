<?php

namespace app\models;

use yii\db\ActiveRecord;

class Contatos extends ActiveRecord
{
    // atribuição de nome da tabela
    public static function tableName()
    {
        return 'contatos';
    }

    // regras dos campos da tabela
    public function rules()
    {
        return [
            [['nome', 'email'], 'required'],
            [['nome', 'email', 'cidade', 'estado'], 'string', 'max' => 100]
        ];
    }

    // atribuição aos nome
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'cidade' => 'Cidade',
            'estado' => 'Estado'
        ];
    }
}
