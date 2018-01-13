<?php 


echo $this->Form->create($user); 				
echo $this->Form->input('name');
echo $this->Form->input('username');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->submit('Save');
echo $this->Form->end();

?>

<a href='http://localhost/curso-cakePHP/school_of_net/admin/users'>back</a>