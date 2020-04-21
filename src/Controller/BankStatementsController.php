<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BankStatements Controller
 *
 * @property \App\Model\Table\BankStatementsTable $BankStatements
 *
 * @method \App\Model\Entity\BankStatement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BankStatementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bankStatements = $this->paginate($this->BankStatements);

        $this->set(compact('bankStatements'));
    }

    /**
     * View method
     *
     * @param string|null $id Bank Statement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bankStatement = $this->BankStatements->get($id, [
            'contain' => []
        ]);

        $this->set('bankStatement', $bankStatement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bankStatement = $this->BankStatements->newEntity();
        if ($this->request->is('post')) {
            $bankStatement = $this->BankStatements->patchEntity($bankStatement, $this->request->getData());
            if ($this->BankStatements->save($bankStatement)) {
                $this->Flash->success(__('The bank statement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank statement could not be saved. Please, try again.'));
        }
        $this->set(compact('bankStatement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bank Statement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bankStatement = $this->BankStatements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bankStatement = $this->BankStatements->patchEntity($bankStatement, $this->request->getData());
            if ($this->BankStatements->save($bankStatement)) {
                $this->Flash->success(__('The bank statement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bank statement could not be saved. Please, try again.'));
        }
        $this->set(compact('bankStatement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bank Statement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bankStatement = $this->BankStatements->get($id);
        if ($this->BankStatements->delete($bankStatement)) {
            $this->Flash->success(__('The bank statement has been deleted.'));
        } else {
            $this->Flash->error(__('The bank statement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
