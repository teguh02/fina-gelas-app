<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemType $itemType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Item Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="itemTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($itemType) ?>
    <fieldset>
        <legend><?= __('Add Item Type') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('desc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
