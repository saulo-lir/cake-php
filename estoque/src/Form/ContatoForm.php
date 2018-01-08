<?php

namespace App\Form;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Network\Email\Email;

class ContatoForm extends Form{

  // Aqui serão definidos quais serão os campos do formulário
  public function _buildSchema(Schema $schema){

    // Criando os campos
    $schema->addField('nome', 'string');
    $schema->addField('email', 'string');
    $schema->addField('mensagem', 'text');

    return $schema;

  }

  // Método para validações do formulário
  public function _buildValidator(Validator $validator){

    $validator->add('mensagem',[
      'minLength' => [
        'rule' => ['minLength', 10],
        'message' => 'A mensagem deve conter no mínimo 10 caracteres.'
      ]
    ]);

    $validator->notEmpty('nome');
    $validator->notEmpty('email');

    return $validator;
  }

  // Processar os dados do formulário
  public function _execute(array $data){
  //  var_dump($data);
  //  exit;

  // Enviar um email

  $email = new Email('gmail'); // Classe do cakePHP responsável pelo envio de emails
  $email->to('saulotec15@gmail.com');
  $email->subject('Contato feito pelo site');

  $msg = "Contato feito pelo site </br>
  Nome: {$data['nome']}<br/>
  Email: {$data['email']}<br/>
  Mensagem: {$data['mensagem']}<br/> ";

  return $email->send($msg);
  }

}


?>
