<?php
// Aqui serão criados os métodos relacionados ao modelo Produto
// Basicamente inserimos as lógicas de negócio aqui

namespace App\model\Entity;
use Cake\ORM\Entity;

class Produto extends Entity{

  public function calculaDesconto(){
    return $this->preco * 0.9;
  }

}


?>
