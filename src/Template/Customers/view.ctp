<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
use Cake\I18n\I18n;
I18n::setLocale('id-ID');
?>

<h3 class="float-left"><?= h($customer->name) ?></h3>

        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['class' => 'float-right'], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> 
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id], ['class' => 'float-right mr-2']) ?> 
<br>    
<div class="table-resposnive">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($customer->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receivables') ?></th>
            <td><?= $this->Number->format($customer->receivables) ?></td>
        </tr>
    </table>
    <div class="related">
        <br>
        <h4><?= __('Related Invoices') ?></h4>
        <br>
        <?php if (!empty($customer->invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Invoice Code') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Invoice Date') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Sent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->invoices as $invoices): ?>
            <tr>
                <td><?= h($invoices->id) ?></td>
                <td><?= h($invoices->invoice_code) ?></td>
                <td><?= h($invoices->customer_id) ?></td>
                <td><?= h($invoices->invoice_date) ?></td>
                <td><?= h($invoices->amount) ?></td>
                <td><?= h($invoices->sent) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <br>
        <h4><?= __('Related Order Fulfilments') ?></h4>
        <br>
        <?php if (!empty($customer->order_fulfilments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Pending Quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->order_fulfilments as $orderFulfilments): ?>
            <tr>
                <td><?= h($orderFulfilments->id) ?></td>
                <td><?= h($orderFulfilments->customer_id) ?></td>
                <td><?= h($orderFulfilments->item_id) ?></td>
                <td><?= h($orderFulfilments->pending_quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderFulfilments', 'action' => 'view', $orderFulfilments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderFulfilments', 'action' => 'edit', $orderFulfilments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderFulfilments', 'action' => 'delete', $orderFulfilments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderFulfilments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <br>
        <h4><?= __('Related Packing Slips') ?></h4>
        <br>
        <?php if (!empty($customer->packing_slips)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Vehicle Id') ?></th>
                <th scope="col"><?= __('Packing Date') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->packing_slips as $packingSlips): ?>
            <tr>
                <td><?= h($packingSlips->id) ?></td>
                <td><?= h($packingSlips->customer_id) ?></td>
                <td><?= h($packingSlips->vehicle_id) ?></td>
                <td><?= h($packingSlips->packing_date) ?></td>
                <td><?= h($packingSlips->address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PackingSlips', 'action' => 'view', $packingSlips->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PackingSlips', 'action' => 'edit', $packingSlips->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PackingSlips', 'action' => 'delete', $packingSlips->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packingSlips->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <br>
        <h4><?= __('Related Payments') ?></h4>
        <br>
        <?php if (!empty($customer->payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Payment Date') ?></th>
                <th scope="col"><?= __('Payment Amount') ?></th>
                <th scope="col"><?= __('Payment Method') ?></th>
                <th scope="col"><?= __('Transaction Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->payments as $payments): ?>
            <tr>
                <td><?= h($payments->id) ?></td>
                <td><?= h($payments->customer_id) ?></td>
                <td><?= h($payments->payment_date) ?></td>
                <td><?= h($payments->payment_amount) ?></td>
                <td><?= h($payments->payment_method) ?></td>
                <td><?= h($payments->transaction_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
