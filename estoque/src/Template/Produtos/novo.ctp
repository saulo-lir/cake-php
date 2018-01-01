<?php
// Declarando um Helper para gerar o html para formulário

                        // Item que será adicionado, [endereço que será enviado o formulário]
  echo $this->Form->create($produto, ['url'=>['controller'=>'produtos','action'=>'salvar']]);
  echo $this->Form->input('id'); // O campo id não será exibido, ele é declarado aqui
                                 // para o cakePHP saber quando o produto vai ser inserido
                                 // ou atualizado
  echo $this->Form->input('nome');
  echo $this->Form->input('preco');
  echo $this->Form->input('descricao');
  echo $this->Form->button('Salvar');
  echo $this->Form->end();

?>
