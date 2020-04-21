<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankStatement $bankStatement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bankStatement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bankStatement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bank Statements'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bankStatements form large-9 medium-8 columns content">
    <?= $this->Form->create($bankStatement) ?>
    <fieldset>
        <legend><?= __('Edit Bank Statement') ?></legend>
        <?php
            echo $this->Form->control('account_name');
            echo $this->Form->control('month');
            echo $this->Form->control('year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
