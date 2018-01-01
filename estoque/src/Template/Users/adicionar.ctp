<h1>Cadastrar Usuário</h1>

<?php
  echo $this->Form->create($user, ['url'=>['controller'=>'users','action'=>'salvar']]);
  echo $this->Form->input('username');
  echo $this->Form->input('password');
  echo $this->Form->button('Adicionar');
  echo $this->Form->end();
?>
