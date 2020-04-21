<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Customers', 'InvoiceItems', 'InvoiceItems.Items']
        ]);

        $this->set('invoice', $invoice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //debug($this->request->getData());

        $invoice = $this->Invoices->newEntity();
        if ($this->request->is('post'))
        {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());

            $conn1=ConnectionManager::get('default');
            $itemsArray = json_decode($this->request->getData()['JSONlist'], true);
            // debug($itemsArray);

            if ($this->Invoices->save($invoice)) {
                foreach($itemsArray as $index => $itemized) {
                    // if unit price is null, use standard unit price
                    if (!array_key_exists("unit_price",$itemized))
                    {
                        $itemized['unit_price'] = $itemized['item_details']['standard_sell_price_per_unit'];
                    };

                    $conn1->execute(
                        'INSERT INTO `invoice_items` (`invoice_id`, `item_id`, `quantity`, `unit_price`, `standard_unit_price`) VALUES (?, ?, ?, ?, ?);',
                        [$invoice->id, $itemized['item_details']['id'], $itemized['quantity'], $itemized['unit_price'], $itemized['item_details']['standard_sell_price_per_unit']],
                        ['integer', 'integer', 'float', 'float', 'float']
                    );
                };
                return $this->redirect(['action' => 'index']);
            };
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Customers', 'InvoiceItems', 'InvoiceItems.Items']
        ]);

        // Convert to JSON
        // Associations will be converted with jsonSerialize hook as well.
        $json = json_encode($invoice);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $conn1=ConnectionManager::get('default');
            $itemsArray = json_decode($this->request->getData()['JSONlist'], true);

            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {

                $conn1->execute(
                    'delete from `invoice_items` where invoice_id = ? ',
                    [$invoice->id],
                    ['integer']
                );

                foreach($itemsArray as $index => $itemized) {
                    // if unit price is null, use standard unit price
                    if (!array_key_exists("unit_price",$itemized))
                    {
                        $itemized['unit_price'] = $itemized['item_details']['standard_sell_price_per_unit'];
                    };

                    $conn1->execute(
                        'INSERT INTO `invoice_items` (`invoice_id`, `item_id`, `quantity`, `unit_price`, `standard_unit_price`) VALUES (?, ?, ?, ?, ?);',
                        [$invoice->id, $itemized['item_details']['id'], $itemized['quantity'], $itemized['unit_price'], $itemized['item_details']['standard_sell_price_per_unit']],
                        ['integer', 'integer', 'integer', 'integer', 'integer']
                    );
                };

                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'customers', 'json'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
