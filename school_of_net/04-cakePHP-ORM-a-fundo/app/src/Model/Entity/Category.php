<?php 

// Por convenção, as Entitys devem ter o nome da tabela no singular
// Toda Entity representa um registro de uma tabela no banco de dados

namespace App\Model\Entity;

use Cake\ORM\Entity;

// Aqui podemos alterar um valor de um registro quando recebemos ou inserimos ele

class Category 
{
	// Altera o valor do registro quando ele for exibido na tela
	protected function getTitle($title){

		return mb_strtolower($title);
	}

	// Altera o valor do registro quando ele for inserido no banco
	protected function setTitle($title){

		return $title.'::cat';
	}


}