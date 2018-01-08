<?php

namespace App\Controller;

use App\Form\ContatoForm; // Classe criada por nós para representar
                          // os campos do formulário

class ContatoController extends AppController{

  public function index(){

    $contato = new ContatoForm();

    // Processar o formulário
    if($this->request->is('post')){
      if($contato->execute($this->request->data())){ // Se o envio for verdadeiro
        $this->Flash->set(__('Email enviado com sucesso'), ['element'=>'success']);
        // __() = Traduz o texto para outras linguagens

      }else{
        $this->Flash->set(__('Falha ao enviar o Email'), ['element'=>'error']);
      }
    }

    $this->set('contato', $contato);
  }

}

?>
