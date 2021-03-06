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
<h3><?= __('Items') ?></h3>
<br>

<div class="items index large-9 medium-8 columns content table-responsive">
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
</div>

<?= $this->Paginator->first('<< ' . __('first')) ?>
<?= $this->Paginator->prev('< ' . __('previous')) ?>
<?= $this->Paginator->next(__('next') . ' >') ?>
<?= $this->Paginator->last(__('last') . ' >>') ?>