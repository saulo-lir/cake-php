<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StockOut Controller
 *
 * @property \App\Model\Table\StockOutTable $StockOut
 *
 * @method \App\Model\Entity\StockOut[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockOutController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products']
        ];
        $stockOut = $this->paginate($this->StockOut);

        $this->set(compact('stockOut'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock Out id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockOut = $this->StockOut->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('stockOut', $stockOut);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockOut = $this->StockOut->newEntity();
        if ($this->request->is('post')) {
            $stockOut = $this->StockOut->patchEntity($stockOut, $this->request->getData());
            if ($this->StockOut->save($stockOut)) {
                $this->Flash->success(__('The stock out has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock out could not be saved. Please, try again.'));
        }
        $products = $this->StockOut->Products->find('list', ['limit' => 200]);
        $this->set(compact('stockOut', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock Out id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockOut = $this->StockOut->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockOut = $this->StockOut->patchEntity($stockOut, $this->request->getData());
            if ($this->StockOut->save($stockOut)) {
                $this->Flash->success(__('The stock out has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock out could not be saved. Please, try again.'));
        }
        $products = $this->StockOut->Products->find('list', ['limit' => 200]);
        $this->set(compact('stockOut', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock Out id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockOut = $this->StockOut->get($id);
        if ($this->StockOut->delete($stockOut)) {
            $this->Flash->success(__('The stock out has been deleted.'));
        } else {
            $this->Flash->error(__('The stock out could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
