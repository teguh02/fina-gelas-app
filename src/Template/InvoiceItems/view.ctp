<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem $invoiceItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice Item'), ['action' => 'edit', $invoiceItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice Item'), ['action' => 'delete', $invoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['controller' => 'OrderFulfilments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['controller' => 'OrderFulfilments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoiceItems view large-9 medium-8 columns content">
    <h3><?= h($invoiceItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Invoice') ?></th>
            <td><?= $invoiceItem->has('invoice') ? $this->Html->link($invoiceItem->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoiceItem->invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $invoiceItem->has('item') ? $this->Html->link($invoiceItem->item->id, ['controller' => 'Items', 'action' => 'view', $invoiceItem->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Fulfilment') ?></th>
            <td><?= $invoiceItem->has('order_fulfilment') ? $this->Html->link($invoiceItem->order_fulfilment->id, ['controller' => 'OrderFulfilments', 'action' => 'view', $invoiceItem->order_fulfilment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoiceItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($invoiceItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit Price') ?></th>
            <td><?= $this->Number->format($invoiceItem->unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Standard Unit Price') ?></th>
            <td><?= $this->Number->format($invoiceItem->standard_unit_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sent') ?></th>
            <td><?= $this->Number->format($invoiceItem->sent) ?></td>
        </tr>
    </table>
</div>
