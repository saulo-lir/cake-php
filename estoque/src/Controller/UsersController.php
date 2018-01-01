<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

use Cake\Event\Event;

class UsersController extends AppController{

  // Quando esse controller for acessado, invocará esse método antes
  // que ele aplique o filtro de login
  public function beforeFilter(Event $event){
    parent::beforeFilter($event); // Invoca o método beforeFilter da classe Pai
                                  // que o possui
    // Iremos liberar alguma páginas antes que o filtro seja aplicado
    $this->Auth->allow(['adicionar', 'salvar']);
  }

  public function adicionar(){

    $usersTable = TableRegistry::get('users');
    $user = $usersTable->newEntity();

    $this->set('user', $user);

  }

  public function salvar(){
    $usersTable = TableRegistry::get('users');

    $user = $usersTable->newEntity($this->request->data());

    if($usersTable->save($user)){
      $this->Flash->set('Usuário Adicionado com sucesso!',['element'=>'success']);

    }else {
      $this->Flash->set('Erro ao adicionar usuário',['element'=>'error']);
    }

    $this->redirect('users\adicionar');
  }

  public function login(){

    // Se a requisição for POST, siginifica que alguém está querendo fazer login
    if($this->request->is('post')){

      // Verifica se o usuário existe no banco
      $user = $this->Auth->identify();

      // Se um usuário for encontrado, redireciona a página
      if($user){
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());

      }else{
        $this->Flash->set('Usuário ou Senha inválidos!',['element' => 'error']);
      }
    }

  }

  public function sair(){
    return $this->redirect($this->Auth->logout());
  }

}

?>
