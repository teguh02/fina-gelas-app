<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repair $repairer
 */
?>



<div class="repairers form large-9 medium-8 columns content">
<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
</div>
