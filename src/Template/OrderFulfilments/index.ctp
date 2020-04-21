<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderFulfilment[]|\Cake\Collection\CollectionInterface $orderFulfilments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderFulfilments index large-9 medium-8 columns content">
    <h3><?= __('Order Fulfilments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pending_quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderFulfilments as $orderFulfilment): ?>
            <tr>
                <td><?= $this->Number->format($orderFulfilment->id) ?></td>
                <td><?= $orderFulfilment->has('customer') ? $this->Html->link($orderFulfilment->customer->name, ['controller' => 'Customers', 'action' => 'view', $orderFulfilment->customer->id]) : '' ?></td>
                <td><?= $orderFulfilment->has('item') ? $this->Html->link($orderFulfilment->item->id, ['controller' => 'Items', 'action' => 'view', $orderFulfilment->item->id]) : '' ?></td>
                <td><?= $this->Number->format($orderFulfilment->pending_quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderFulfilment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderFulfilment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderFulfilment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderFulfilment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
