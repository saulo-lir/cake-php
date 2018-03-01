<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
class ExampleController extends AppController
{
    public function index()
    {
        $categories = TableRegistry::get('Categories');
        $query = $categories->find();
        $result = $categories->find()
            ->contain(['Users'])
            ->select([
                'id',
                'title',
                'Users.name',
                'media' => $query->func()->now()
            ])
            ->where(['Categories.id in'=>[1, 2, 3]])
            ->order(['Categories.title'=> 'desc'])
            ->limit(2)
            ->first();
        debug($result);
        exit;
    }
}

/* 
Link da documentação do Query Builder:

https://book.cakephp.org/3.0/en/orm/query-builder

Link com todas as funções SQL suportadas pelo Query Builder:

https://book.cakephp.org/3.0/en/orm/query-builder.html#using-sql-functions

*/