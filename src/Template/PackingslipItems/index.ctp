<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackingslipItem[]|\Cake\Collection\CollectionInterface $packingslipItems
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Packingslip Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Packing Slips'), ['controller' => 'PackingSlips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Packing Slip'), ['controller' => 'PackingSlips', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['controller' => 'OrderFulfilments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['controller' => 'OrderFulfilments', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<h3><?= __('Packingslip Items') ?></h3>
<br>
<div class="packingslipItems index table-responsive large-9 medium-8 columns content">
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('packingSlip_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orderFulfilment_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($packingslipItems as $packingslipItem): ?>
            <tr>
                <td><?= $this->Number->format($packingslipItem->id) ?></td>
                <td><?= $packingslipItem->has('packing_slip') ? $this->Html->link($packingslipItem->packing_slip->id, ['controller' => 'PackingSlips', 'action' => 'view', $packingslipItem->packing_slip->id]) : '' ?></td>
                <td><?= $packingslipItem->has('item') ? $this->Html->link($packingslipItem->item->id, ['controller' => 'Items', 'action' => 'view', $packingslipItem->item->id]) : '' ?></td>
                <td><?= $this->Number->format($packingslipItem->quantity) ?></td>
                <td><?= $packingslipItem->has('order_fulfilment') ? $this->Html->link($packingslipItem->order_fulfilment->id, ['controller' => 'OrderFulfilments', 'action' => 'view', $packingslipItem->order_fulfilment->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $packingslipItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $packingslipItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $packingslipItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packingslipItem->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<br>

<?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>