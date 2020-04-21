<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Packing Slips'), ['controller' => 'PackingSlips', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Packing Slip'), ['controller' => 'PackingSlips', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicles view large-9 medium-8 columns content">
    <h3><?= h($vehicle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rego') ?></th>
            <td><?= h($vehicle->rego) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($vehicle->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($vehicle->year) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Packing Slips') ?></h4>
        <?php if (!empty($vehicle->packing_slips)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Vehicle Id') ?></th>
                <th scope="col"><?= __('Packing Date') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicle->packing_slips as $packingSlips): ?>
            <tr>
                <td><?= h($packingSlips->id) ?></td>
                <td><?= h($packingSlips->customer_id) ?></td>
                <td><?= h($packingSlips->vehicle_id) ?></td>
                <td><?= h($packingSlips->packing_date) ?></td>
                <td><?= h($packingSlips->address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PackingSlips', 'action' => 'view', $packingSlips->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PackingSlips', 'action' => 'edit', $packingSlips->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PackingSlips', 'action' => 'delete', $packingSlips->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packingSlips->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
