<?php
// Toda classe que representa uma tabela do banco de dados
// é criada dentro deste diretório

// Definindo o namespace
namespace App\Model\Table;

// Usando a classe Table
use Cake\ORM\Table;

// ORM = Object Relational Mapping, é o mapeador de objetos para banco de dados

use Cake\Validation\Validator;

  class ProdutosTable extends Table{

    // Validar o cadastro de um produto
    public function validationDefault(Validator $validator){

      // Torna o preenchimento do campo obrigatório
      $validator->requirePresence('nome',true)->notEmpty('nome');

      // Adiciona um valor mínimo de caracteres na descrição
      $validator->add('descricao', [
        'minLength' => [
          'rule' => ['minLength', 10], // Mínimo de 10 caracteres
          'message' => 'A descrição deve conter pelo menos 10 caracteres'
        ]
      ]);

      // Validar o preço
      $validator->add('preco', [
        'decimal' => [
          'rule' => ['decimal', 2],
          'message' => 'Digite um número decimal separado por . (ponto)'
        ]
      ]);

      return $validator;
    }

  }

?>
