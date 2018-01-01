<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity{

  protected $_accessible = [
    '*' => true, // Deixa todos os atributos acessíveis
    'id' => false, // O id não pode ser acessado externamente, é privado
  ];

  // Método para criptografar toda senha que for cadastrada no sistema
  public function _setPassword($password){
    return (new DefaultPasswordHasher)->hash($password);
  }

}


?>
