  <table>
  <thead>
    <tr>
      <th><?= __('Id') ?></th>
      <th><?= __('Nome') ?></th>
      <th><?= __('Preço') ?></th>
      <th><?= __('Preço com Desconto') ?></th>
      <th><?= __('Descrição') ?></th>
      <th><?= __('Ações') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($produtos as $produto){ ?>
    <tr>
      <td><?= $produto['id']; ?></td>
      <td><?= $produto['nome']; ?></td>
      <td><?= $this->Money->format($produto['preco']); ?></td> <!-- Helper criado por nós para formatar dinheiro -->
      <td><?= $this->Money->format($produto->calculaDesconto()); ?></td>
      <td><?= $produto['descricao']; ?></td>
      <td>
        <?php
          echo $this->Html->Link('Editar',
          ['controller'=>'produtos','action'=>'editar', $produto['id']]);
                                                      // Passando via GET o id do produto
                    // Os dados serão passados via POST
          echo $this->Form->postLink('Excluir',
          ['controller'=>'produtos','action'=>'excluir', $produto['id']],
          ['confirm'=>__('Tem certeza que deseja apagar o produto ').$produto['nome'].' ?']);
          // Mensagem de confirmação
        ?>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>

<!-- Declarando um Helper para gerar o html para link-->

<?php
  echo $this->Html->Link(__('Novo Produto '),['controller'=>'produtos', 'action'=>'novo']);
                  // Nome do Link, controlador que queremos utilizar, action que queremos utilizar

  echo $this->Html->Link(__(' Sair'),['controller'=>'users', 'action' =>'sair']);
?>
<!--
  Dispensa o uso convencional de links:
  <a href='produtos/novo'>Adicionar Produto</a>
-->

<div class='paginator'>
  <ul class='pagination'>
    <?php
      // Adicionado a listagem de páginas para paginação

      echo $this->Paginator->prev(__('Voltar'));
      echo $this->Paginator->numbers(); // Exibe o número de páginas
      echo $this->Paginator->next(__('Avançar'));
    ?>
  </ul>
</div>
