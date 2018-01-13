<?php
namespace App\Model\Table;

use Cake\ORM\Table;


class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->addBehavior('Timestamp'); // Timestamp = Adiciona data de criação e atualização (campos created e modified das tabelas)
        
    }



}