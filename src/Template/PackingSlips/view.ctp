<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PackingSlip $packingSlip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Packing Slip'), ['action' => 'edit', $packingSlip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Packing Slip'), ['action' => 'delete', $packingSlip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packingSlip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Packing Slips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Packing Slip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="packingSlips view large-9 medium-8 columns content">
    <h3><?= h($packingSlip->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $packingSlip->has('customer') ? $this->Html->link($packingSlip->customer->name, ['controller' => 'Customers', 'action' => 'view', $packingSlip->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicle') ?></th>
            <td><?= $packingSlip->has('vehicle') ? $this->Html->link($packingSlip->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $packingSlip->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($packingSlip->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($packingSlip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Packing Date') ?></th>
            <td><?= h($packingSlip->packing_date) ?></td>
        </tr>
    </table>
</div>
