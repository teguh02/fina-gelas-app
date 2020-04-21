<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */

use Cake\I18n\I18n;
use Cake\I18n\Time;
use Cake\I18n\Number;

I18n::setLocale('id-ID');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['controller' => 'InvoiceItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['controller' => 'InvoiceItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Fulfilments'), ['controller' => 'OrderFulfilments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Fulfilment'), ['controller' => 'OrderFulfilments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Packingslip Items'), ['controller' => 'PackingslipItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Packingslip Item'), ['controller' => 'PackingslipItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= __('Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('standard_sell_price_per_unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('standard_supplier_price_per_unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unitsperbox') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boxperunit') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->item_code) ?></td>
                <td><?= h($item->item_name) ?></td>
                <td><?= $item->has('item_type') ? $this->Html->link($item->item_type->name, ['controller' => 'ItemTypes', 'action' => 'view', $item->item_type->id]) : '' ?></td>
                <td><?= h($item->unit) ?></td>
                <td><?= $this->Number->format($item->standard_sell_price_per_unit) ?></td>
                <td><?= $this->Number->format($item->standard_supplier_price_per_unit) ?></td>
                <td><?= $this->Number->format($item->unitsperbox) ?></td>
                <td><?= $this->Number->format($item->boxperunit) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
