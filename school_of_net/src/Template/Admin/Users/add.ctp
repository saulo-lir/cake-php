<?php 

// Criando um formulário através do helper Form

echo $this->Form->create($user); // Variável user passada através da action add()
								  // Representa a nova entidade criada

				// Os mesmos campos da tabela users
echo $this->Form->input('name');
echo $this->Form->input('username');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->submit('Save');
echo $this->Form->end();

?>

<a href='http://localhost/curso-cakePHP/school_of_net/admin/users'>back</a>