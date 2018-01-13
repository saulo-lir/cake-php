<?php 

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;


class UsersController extends AppController{

	// O componente Auth bloqueia todas as páginas do site para
	// um usuário não autenticado, por isso caso queiramos liberar
	// algumas páginas para todos os usuários, utilizamos o método
	// beforeFilter para desbloquear

	// O beforeFilter é um evento que é executado sempre antes da action

	public function beforeFilter(Event $event){
		parent::beforeFilter($event); // Permite que todo beforeFilter 
		// que seja criado na classe pai (AppController) de forma global,
		// fique funcionando nesse método

		$this->Auth->allow(['add','edit']); // Aqui as actions são liberada
		// $this->Auth->deny('edit');  Bloqueia as actions
	}

	public function index(){
	// Criando a paginação
		$users = $this->paginate($this->Users);
							// Model que iremos utilizar

		// Envia o conteudo para a view
		$this->set(compact('users'));

		// Outra forma de utilizar o set():
		// $this->set(['users'=>$users]);
					// view => variável que será utilizada na view

	}

	public function login(){

		if($this->request->is('post')){
			// debug($this->request->data);

			// Identificar o usuário

			$user = $this->Auth->identify();
			

			if($user){ // Se o usuário for encontrado

				$this->Auth->setUser($user); // O usuário é gravado na sessão
				return $this->redirect($this->Auth->redirectUrl()); // Redireciona a página para a url informada. 
				// Caso não seja informada, redireciona para a páina inicial

			}
		}

	}

	public function logout(){

		$this->Auth->logout();
		return $this->redirect(['action'=>'login']);

	}

	public function add(){
		// Pegar os dados do formulário

		$user = $this->Users->newEntity(); // Cria uma nova entidade que representa a tabela		

		if($this->request->is('post')){			

			/* Recebe os campos especificados 
			$user->name = $this->request->data['name']; 
			$user->name = $this->request->data['username'];
							.
							.
							.
			*/

			// Receber os dados de forma simplificada


			$user = $this->Users->patchEntity($user, $this->request->data);
								// Entidade criada, campos do formulário					

			// Salvar os dados no banco
			if($this->Users->save($user)){				
				$this->Flash->success('Usuário cadastrado com sucesso!');
					// Compoent Flash
				$this->redirect(['controller'=>'users', 'action'=>'index']);
				
			}else{				
				$this->Flash->error('Erro ao cadastrar usuário :/');		

			}
		}

		$this->set(compact('user'));

	}

	public function edit($id){

		$user = $this->Users->get($id);

		if($this->request->is(['post','put'])){	// Para edição, usa-se a requisição do tipo put. Deixa no array os dois tipos, para caso
		// o servidor precise usar
			
			$user = $this->Users->patchEntity($user, $this->request->data);
								
			
			if($this->Users->save($user)){				
				$this->Flash->success('Dados atualizados com sucesso!');

			}else{				
				$this->Flash->error('Erro ao atualizar usuário :/');		
			}
		}

		$this->set(compact('user'));

	}

	public function view($id){
		$user = $this->Users->get($id); // Seleciona todos os dados da tabela users pelo id
		$this->set(compact('user'));
	}

	public function delete($id){
		// Bloqueio de segurança: Irá aceitar apenas requisições do tipo post e delete
		$this->request->allowMethod(['post', 'delete']);

		$user = $this->Users->get($id);

		if($this->Users->delete($user)){			
			$this->Flash->success('Deletado com sucesso!');

		}else{			
			$this->Flash->error('Erro ao deletar');
		}

		$this->redirect(['controller'=>'users', 'action'=>'index']);
		// Também poderia ser omitido o controller, uma vez que estamos 
		// enviando para o mesmo controller dessa action
	}


}



?>