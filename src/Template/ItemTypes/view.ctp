<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemType $itemType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Type'), ['action' => 'edit', $itemType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Type'), ['action' => 'delete', $itemType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemTypes view large-9 medium-8 columns content">
    <h3><?= h($itemType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($itemType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desc') ?></th>
            <td><?= h($itemType->desc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemType->id) ?></td>
        </tr>
    </table>
</div>
