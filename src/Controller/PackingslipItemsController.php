<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PackingslipItems Controller
 *
 * @property \App\Model\Table\PackingslipItemsTable $PackingslipItems
 *
 * @method \App\Model\Entity\PackingslipItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PackingslipItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PackingSlips', 'Items', 'OrderFulfilments']
        ];
        $packingslipItems = $this->paginate($this->PackingslipItems);

        $this->set(compact('packingslipItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Packingslip Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $packingslipItem = $this->PackingslipItems->get($id, [
            'contain' => ['PackingSlips', 'Items', 'OrderFulfilments']
        ]);

        $this->set('packingslipItem', $packingslipItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $packingslipItem = $this->PackingslipItems->newEntity();
        if ($this->request->is('post')) {
            $packingslipItem = $this->PackingslipItems->patchEntity($packingslipItem, $this->request->getData());
            if ($this->PackingslipItems->save($packingslipItem)) {
                $this->Flash->success(__('The packingslip item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The packingslip item could not be saved. Please, try again.'));
        }
        $packingSlips = $this->PackingslipItems->PackingSlips->find('list', ['limit' => 200]);
        $items = $this->PackingslipItems->Items->find('list', ['limit' => 200]);
        $orderFulfilments = $this->PackingslipItems->OrderFulfilments->find('list', ['limit' => 200]);
        $this->set(compact('packingslipItem', 'packingSlips', 'items', 'orderFulfilments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Packingslip Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $packingslipItem = $this->PackingslipItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $packingslipItem = $this->PackingslipItems->patchEntity($packingslipItem, $this->request->getData());
            if ($this->PackingslipItems->save($packingslipItem)) {
                $this->Flash->success(__('The packingslip item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The packingslip item could not be saved. Please, try again.'));
        }
        $packingSlips = $this->PackingslipItems->PackingSlips->find('list', ['limit' => 200]);
        $items = $this->PackingslipItems->Items->find('list', ['limit' => 200]);
        $orderFulfilments = $this->PackingslipItems->OrderFulfilments->find('list', ['limit' => 200]);
        $this->set(compact('packingslipItem', 'packingSlips', 'items', 'orderFulfilments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Packingslip Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $packingslipItem = $this->PackingslipItems->get($id);
        if ($this->PackingslipItems->delete($packingslipItem)) {
            $this->Flash->success(__('The packingslip item has been deleted.'));
        } else {
            $this->Flash->error(__('The packingslip item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
