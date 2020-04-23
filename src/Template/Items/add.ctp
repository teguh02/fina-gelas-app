<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['controller' => 'InvoiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['controller' => 'InvoiceItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['controller' => 'OrderFulfilments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['controller' => 'OrderFulfilments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Packingslip Items'), ['controller' => 'PackingslipItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Packingslip Item'), ['controller' => 'PackingslipItems', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->control('item_code');
            echo $this->Form->control('item_name');
            echo $this->Form->control('type_id', ['options' => $types, 'class'=>'customInputArea', 'label' => 'Tipe Barang']);
            echo $this->Form->control('unit');
            echo $this->Form->control('standard_sell_price_per_unit');
            echo $this->Form->control('standard_supplier_price_per_unit');
            echo $this->Form->control('unitsperbox');
            echo $this->Form->control('boxperunit');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
