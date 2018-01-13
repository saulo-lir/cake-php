<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher; // Habilita a classe que criptografa as senhas


class User extends Entity
{

    protected $_accessible = [
        'name' => true,
        'username' => true,
        'email' => true,
        'password' => true,
        'created' => true,
        'updated' => true,        
    ];

    protected function _setPassword($password){ // Permite alterar o valor do campo passado como parâmetro, no caso a senha      

        return (new DefaultPasswordHasher)->hash($password);

        // $hasher = new DefaultPasswordHasher;

       // return $hasher->hash($password);

    }
    
}
