<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankStatement[]|\Cake\Collection\CollectionInterface $bankStatements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bank Statement'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bankStatements index large-9 medium-8 columns content">
    <h3><?= __('Bank Statements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bankStatements as $bankStatement): ?>
            <tr>
                <td><?= $this->Number->format($bankStatement->id) ?></td>
                <td><?= h($bankStatement->account_name) ?></td>
                <td><?= $this->Number->format($bankStatement->month) ?></td>
                <td><?= $this->Number->format($bankStatement->year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bankStatement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bankStatement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bankStatement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankStatement->id)]) ?>
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
