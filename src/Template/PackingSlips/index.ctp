<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackingSlip[]|\Cake\Collection\CollectionInterface $packingSlips
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Packing Slip'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="packingSlips index large-9 medium-8 columns content">
    <h3><?= __('Packing Slips') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('packing_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($packingSlips as $packingSlip): ?>
            <tr>
                <td><?= $this->Number->format($packingSlip->id) ?></td>
                <td><?= $packingSlip->has('customer') ? $this->Html->link($packingSlip->customer->name, ['controller' => 'Customers', 'action' => 'view', $packingSlip->customer->id]) : '' ?></td>
                <td><?= $packingSlip->has('vehicle') ? $this->Html->link($packingSlip->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $packingSlip->vehicle->id]) : '' ?></td>
                <td><?= h($packingSlip->packing_date) ?></td>
                <td><?= h($packingSlip->address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $packingSlip->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $packingSlip->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $packingSlip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packingSlip->id)]) ?>
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
