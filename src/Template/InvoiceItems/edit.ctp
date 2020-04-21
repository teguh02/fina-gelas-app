<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem $invoiceItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoiceItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['controller' => 'OrderFulfilments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['controller' => 'OrderFulfilments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoiceItems form large-9 medium-8 columns content">
    <?= $this->Form->create($invoiceItem) ?>
    <fieldset>
        <legend><?= __('Edit Invoice Item') ?></legend>
        <?php
            echo $this->Form->control('invoice_id', ['options' => $invoices]);
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('unit_price');
            echo $this->Form->control('standard_unit_price');
            echo $this->Form->control('sent');
            echo $this->Form->control('orderFulfilment_id', ['options' => $orderFulfilments, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
