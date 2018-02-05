<div class='column content'>

	<h3>Login</h3>

	<?php 
		echo $this->Form->create();
	?>

	<fieldset>
	 	<?php
		echo $this->Form->input('email',[
			'placeholder'=>'Seu email aqui...',
			'required'=>'true'
		]);

		echo $this->Form->input('password', [ // nome do campo no banco, [propriedades /atributos do campo input]
			'label'=>'Senha',
			'placeholder'=>'****',
			'required'=>'true'

		]);
		echo $this->Form->button('Entrar');
		?>	
	</fieldset>

	<?php
		echo $this->Form->end();
	?>

</div>