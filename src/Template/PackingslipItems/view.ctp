<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackingslipItem $packingslipItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Packingslip Item'), ['action' => 'edit', $packingslipItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Packingslip Item'), ['action' => 'delete', $packingslipItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packingslipItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Packingslip Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Packingslip Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Packing Slips'), ['controller' => 'PackingSlips', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Packing Slip'), ['controller' => 'PackingSlips', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['controller' => 'OrderFulfilments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['controller' => 'OrderFulfilments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="packingslipItems view large-9 medium-8 columns content">
    <h3><?= h($packingslipItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Packing Slip') ?></th>
            <td><?= $packingslipItem->has('packing_slip') ? $this->Html->link($packingslipItem->packing_slip->id, ['controller' => 'PackingSlips', 'action' => 'view', $packingslipItem->packing_slip->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $packingslipItem->has('item') ? $this->Html->link($packingslipItem->item->id, ['controller' => 'Items', 'action' => 'view', $packingslipItem->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Fulfilment') ?></th>
            <td><?= $packingslipItem->has('order_fulfilment') ? $this->Html->link($packingslipItem->order_fulfilment->id, ['controller' => 'OrderFulfilments', 'action' => 'view', $packingslipItem->order_fulfilment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($packingslipItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($packingslipItem->quantity) ?></td>
        </tr>
    </table>
</div>
