<?php 

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\Event;
use Cake\Model\Entity\Category;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class CategoriesTable extends Table
{

	public function initialize(array $config){

		//debug($config);

		// Setando a tabela
		// $this->setTable('categories'); setTable: Usada até a versão 3.4 do cakePHP

		$this->table('categories'); // table: Usada a partir da versão 3.4 do cakePHP em diante

		// Setando a chave primária (Opcional)
		$this->primaryKey('id'); // setPrimaryKey() até a versão 3.4 do cakePHP

		// Setando uma Entity
		$this->EntityClass('App\Model\Entity\Category');

		// Adicionando um Behavior
		$this->addBehavior('Timestamp');

		/* Associações entre tabelas */ 

		// 1 para 1 = hasOne
		// 1 para muitos = hasMany
		// Muitos para 1 = belongsTo
		// Muitos para muitos = belongsToMany

		$this->belongsTo('Users',[
			'foreignKey' => 'user_id'
		]);

		$this->belongsToMany('Products', [
            
            // Todos esses parâmetros são opcionais

            'foreignKey' => 'category_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'categories_products'
        ]);
	}

	// Método que é executado antes de ser inserido um novo valor no banco
	public function beforeSave(Event $event, Category $entity, \ArrayObject $options){

		// debug($entity);
		// debug('Antes de salvar');

	}


	// Adicionando validações no sistema									
	public function validationDefault(Validator $validator){

		$validator
				->requirePresence('title', 'create') // O campo title é obrigatório no momento da criação no registro do banco
				->notEmpty('title'); // O campo title não pode estar vazio
	
		$validator
				->allowEmpty('description'); // Permite que o campo description fique vazio

		return $validator;		
	}

	public function buildRules(RulesChecker $rules){

		$rules->add(function ($entity, $options){

			return true;

		});

		/* Regras de validações 

		$rules->addCreate(function ($entity, $options){

			Regras...

			return true ou false;
		});

		$rules->addUpdate(function ($entity, $options){

			Regras...

			return true ou false;
			
		});

		$rules->addDelete(function ($entity, $options){

			Regras...

			return true ou false;
			
		});

		*/

		return $rules;
	}

	// Todas as validações estão disponíveis em: https://api.cakephp.org/3.5/class-Cake.Validation.Validation.html

}