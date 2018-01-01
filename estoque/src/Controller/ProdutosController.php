<?php
// Definindo o namespace
namespace App\Controller;

// Usando a classe TableRegistry
use Cake\ORM\TableRegistry;

class ProdutosController extends AppController{

  public $paginate = [ // Especifica o número de produtos por página
    'limit'=> 3
  ];

  // Método initialize para ativar a paginação
  public function initialize(){
    parent::initialize(); // Invocando a classe pai

    // Carregar o componente que faz a paginação
    $this->loadComponent('Paginator');
  }

  // Action principal
  public function index(){

                    // Seleciona a tabela que queremos utilizar
    $produtosTable = TableRegistry::get('produtos');
                              // Seleciona todos os registros da tabela
    $produtos = $produtosTable->find('all');


    // Enviar os dados para a view com paginação
    $this->set('produtos',$this->paginate($produtos));
  // nome da variável, conteúdo da variável

  //$this->set($produto); passando o array inteiro para a view
  // Para usa-lo, precisaríamos apenas chamar o índice do array
  // Ex.: <td><?= $nome ></td>
  }

  public function novo(){
    $produtosTable = TableRegistry::get('produtos'); // Seleciona a tabela que queremos utilizar
    $produto = $produtosTable->newEntity(); // Cria uma entidade vazia para ser adicionada na tabela produtos

    // Uma Entity representa um registro do banco

    $this->set('produto',$produto);
  }

  // Action para salvar um novo produto
  public function salvar(){

    $produtosTable = TableRegistry::get('produtos');

    // Pegar os dados do formulário e passar para a nova entidade/registro criada
    $produto = $produtosTable->newEntity($this->request->data());

    // Salvar dados no banco
    if(!$produto->errors() && $produtosTable->save($produto)){
      $msg = 'Produto salvo com sucesso!';
      $this->Flash->set($msg,['element'=>'success']);

    }else{
      $msg = 'Erro ao salvar o produto :/';
      $this->Flash->set($msg,['element'=>'error']);
    }

    $this->set('produto',$produto);
    $this->render('novo');

  }

  public function editar($id){

    // Selecionar os dados da tabela produtos
    $produtosTable = TableRegistry::get('produtos');
    $produto = $produtosTable->get($id);

    $this->set('produto',$produto);

    // Reaproveitar o template novo.ctp para esta action
    $this->render('novo');
  }

  public function excluir($id){

    $produtosTable = TableRegistry::get('produtos');
    $produto = $produtosTable->get($id);

    // Deletando o produto
    if($produtosTable->delete($produto)){
      $msg = 'Produto removido com sucesso!';
      $this->Flash->set($msg, ['element'=>'error']); // Adicionando a mensagem ao escopo flash para
                                                     // poder ser enviada junto com a reqquisição
    }else{
      $msg = 'Erro ao deletar o produto :/';
      $this->Flash->set($msg);
    }

    // Redirecionar a página após a deleção
    $this->redirect('produtos/index');

    // Enviar a mesagem $msg após o redirecionamento da páfgina
    // Utilizamos o Flash Scope: Tudo que criamos nesse escopo,
    // irá durar uma requisição inteira

  }

}

?>
