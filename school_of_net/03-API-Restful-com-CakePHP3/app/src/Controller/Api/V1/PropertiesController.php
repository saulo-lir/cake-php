<?php 

namespace App\Controller\Api\V1;

class PropertiesController extends AppController
{
	
	/*
	public function index(){

		$properties = $this->Properties->find()->all();

		$this->set('properties', $properties);
		$this->set('_serialize', ['properties']); // _serialize = Serializa os dados no formato JSON
	}
	*/

	use \Crud\Controller\ControllerTrait; // Adiciona a classe ControllerTrait ao projeto

	public function view($id = null){
		$this->Crud->on('beforeFind', function(\Cake\Event\Event $event){
			$event->subject()->query()->contain(['PropertiesTypes', 'Districts']);
		});

		return $this->Crud->execute();
	}
}