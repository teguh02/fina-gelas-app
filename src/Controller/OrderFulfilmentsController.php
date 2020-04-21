<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderFulfilments Controller
 *
 * @property \App\Model\Table\OrderFulfilmentsTable $OrderFulfilments
 *
 * @method \App\Model\Entity\OrderFulfilment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderFulfilmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Items']
        ];
        $orderFulfilments = $this->paginate($this->OrderFulfilments);

        $this->set(compact('orderFulfilments'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Fulfilment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderFulfilment = $this->OrderFulfilments->get($id, [
            'contain' => ['Customers', 'Items']
        ]);

        $this->set('orderFulfilment', $orderFulfilment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderFulfilment = $this->OrderFulfilments->newEntity();
        if ($this->request->is('post')) {
            $orderFulfilment = $this->OrderFulfilments->patchEntity($orderFulfilment, $this->request->getData());
            if ($this->OrderFulfilments->save($orderFulfilment)) {
                $this->Flash->success(__('The order fulfilment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order fulfilment could not be saved. Please, try again.'));
        }
        $customers = $this->OrderFulfilments->Customers->find('list', ['limit' => 200]);
        $items = $this->OrderFulfilments->Items->find('list', ['limit' => 200]);
        $this->set(compact('orderFulfilment', 'customers', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Fulfilment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderFulfilment = $this->OrderFulfilments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderFulfilment = $this->OrderFulfilments->patchEntity($orderFulfilment, $this->request->getData());
            if ($this->OrderFulfilments->save($orderFulfilment)) {
                $this->Flash->success(__('The order fulfilment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order fulfilment could not be saved. Please, try again.'));
        }
        $customers = $this->OrderFulfilments->Customers->find('list', ['limit' => 200]);
        $items = $this->OrderFulfilments->Items->find('list', ['limit' => 200]);
        $this->set(compact('orderFulfilment', 'customers', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Fulfilment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderFulfilment = $this->OrderFulfilments->get($id);
        if ($this->OrderFulfilments->delete($orderFulfilment)) {
            $this->Flash->success(__('The order fulfilment has been deleted.'));
        } else {
            $this->Flash->error(__('The order fulfilment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
