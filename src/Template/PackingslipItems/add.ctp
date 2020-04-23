<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackingslipItem $packingslipItem
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Packingslip Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Packing Slips'), ['controller' => 'PackingSlips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Packing Slip'), ['controller' => 'PackingSlips', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['controller' => 'OrderFulfilments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['controller' => 'OrderFulfilments', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="packingslipItems form large-9 medium-8 columns content">
    <?= $this->Form->create($packingslipItem) ?>
    <fieldset>
        <legend><?= __('Add Packingslip Item') ?></legend>
        <?php
            echo $this->Form->control('packingSlip_id', ['options' => $packingSlips]);
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('orderFulfilment_id', ['options' => $orderFulfilments, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
