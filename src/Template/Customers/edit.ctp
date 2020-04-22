<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->control('name', array('label' => 'Nama Customer'));
            echo $this->Form->control('location', array('label' => 'Lokasi'));
            echo $this->Form->control('receivables', array('label' => 'Net Hutang Piutang'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <button onclick="window.history.back();" class="mt-3">Kembali</button>
    <?= $this->Form->end() ?>
</div>
