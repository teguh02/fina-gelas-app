<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackingSlip $packingSlip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $packingSlip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $packingSlip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Packing Slips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="packingSlips form large-9 medium-8 columns content">
    <?= $this->Form->create($packingSlip) ?>
    <fieldset>
        <legend><?= __('Edit Packing Slip') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->control('packing_date');
            echo $this->Form->control('address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
