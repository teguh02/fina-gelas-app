<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PackingSlips Controller
 *
 * @property \App\Model\Table\PackingSlipsTable $PackingSlips
 *
 * @method \App\Model\Entity\PackingSlip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PackingSlipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Vehicles']
        ];
        $packingSlips = $this->paginate($this->PackingSlips);

        $this->set(compact('packingSlips'));
    }

    /**
     * View method
     *
     * @param string|null $id Packing Slip id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $packingSlip = $this->PackingSlips->get($id, [
            'contain' => ['Customers', 'Vehicles']
        ]);

        $this->set('packingSlip', $packingSlip);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $packingSlip = $this->PackingSlips->newEntity();
        if ($this->request->is('post')) {
            $packingSlip = $this->PackingSlips->patchEntity($packingSlip, $this->request->getData());
            if ($this->PackingSlips->save($packingSlip)) {
                $this->Flash->success(__('The packing slip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The packing slip could not be saved. Please, try again.'));
        }
        $customers = $this->PackingSlips->Customers->find('list', ['limit' => 200]);
        $vehicles = $this->PackingSlips->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('packingSlip', 'customers', 'vehicles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Packing Slip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $packingSlip = $this->PackingSlips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $packingSlip = $this->PackingSlips->patchEntity($packingSlip, $this->request->getData());
            if ($this->PackingSlips->save($packingSlip)) {
                $this->Flash->success(__('The packing slip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The packing slip could not be saved. Please, try again.'));
        }
        $customers = $this->PackingSlips->Customers->find('list', ['limit' => 200]);
        $vehicles = $this->PackingSlips->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('packingSlip', 'customers', 'vehicles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Packing Slip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $packingSlip = $this->PackingSlips->get($id);
        if ($this->PackingSlips->delete($packingSlip)) {
            $this->Flash->success(__('The packing slip has been deleted.'));
        } else {
            $this->Flash->error(__('The packing slip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
