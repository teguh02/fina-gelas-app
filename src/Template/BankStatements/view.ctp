<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankStatement $bankStatement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bank Statement'), ['action' => 'edit', $bankStatement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bank Statement'), ['action' => 'delete', $bankStatement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankStatement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bank Statements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Statement'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bankStatements view large-9 medium-8 columns content">
    <h3><?= h($bankStatement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Account Name') ?></th>
            <td><?= h($bankStatement->account_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bankStatement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $this->Number->format($bankStatement->month) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($bankStatement->year) ?></td>
        </tr>
    </table>
</div>
