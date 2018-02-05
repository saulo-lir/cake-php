<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StockIn Controller
 *
 * @property \App\Model\Table\StockInTable $StockIn
 *
 * @method \App\Model\Entity\StockIn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockInController extends AppController
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
        $stockIn = $this->paginate($this->StockIn);

        $this->set(compact('stockIn'));
    }

    /**
     * View method
     *
     * @param string|null $id Stock In id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stockIn = $this->StockIn->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('stockIn', $stockIn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stockIn = $this->StockIn->newEntity();
        if ($this->request->is('post')) {
            $stockIn = $this->StockIn->patchEntity($stockIn, $this->request->getData());
            if ($this->StockIn->save($stockIn)) {
                $this->Flash->success(__('The stock in has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock in could not be saved. Please, try again.'));
        }
        $products = $this->StockIn->Products->find('list', ['limit' => 200]);
        $this->set(compact('stockIn', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock In id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stockIn = $this->StockIn->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stockIn = $this->StockIn->patchEntity($stockIn, $this->request->getData());
            if ($this->StockIn->save($stockIn)) {
                $this->Flash->success(__('The stock in has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock in could not be saved. Please, try again.'));
        }
        $products = $this->StockIn->Products->find('list', ['limit' => 200]);
        $this->set(compact('stockIn', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock In id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stockIn = $this->StockIn->get($id);
        if ($this->StockIn->delete($stockIn)) {
            $this->Flash->success(__('The stock in has been deleted.'));
        } else {
            $this->Flash->error(__('The stock in could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
