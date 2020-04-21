<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderFulfilment $orderFulfilment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Fulfilment'), ['action' => 'edit', $orderFulfilment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Fulfilment'), ['action' => 'delete', $orderFulfilment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderFulfilment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderFulfilments view large-9 medium-8 columns content">
    <h3><?= h($orderFulfilment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $orderFulfilment->has('customer') ? $this->Html->link($orderFulfilment->customer->name, ['controller' => 'Customers', 'action' => 'view', $orderFulfilment->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $orderFulfilment->has('item') ? $this->Html->link($orderFulfilment->item->id, ['controller' => 'Items', 'action' => 'view', $orderFulfilment->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderFulfilment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pending Quantity') ?></th>
            <td><?= $this->Number->format($orderFulfilment->pending_quantity) ?></td>
        </tr>
    </table>
</div>
