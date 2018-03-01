<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UserTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('user');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Categories', [
            'foreignKey' => 'user_id' // Parâmetro opcional
        ]);
    }

   
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
