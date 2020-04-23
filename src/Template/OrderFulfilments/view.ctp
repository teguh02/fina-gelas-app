<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderFulfilment $orderFulfilment
 */
?>

<h3 class="float-left"><?= h($orderFulfilment->id) ?></h3>

        <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderFulfilment->id], ['class' => 'float-right ml-2'], ['confirm' => __('Are you sure you want to delete # {0}?', $orderFulfilment->id)]) ?> </li>
        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderFulfilment->id], ['class' => 'float-right']) ?> </li>

        <br><br>

<div class="orderFulfilments view large-9 medium-8 columns content table-responsive">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $orderFulfilment->has('customer') ? $this->Html->link($orderFulfilment->customer->name, ['controller' => 'Customers', 'action' => 'view', $orderFulfilment->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $orderFulfilment->has('item') ? $this->Html->link($orderFulfilment->item->id, ['controller' => 'Items', 'action' => 'view', $orderFulfilment->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderFulfilment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pending Quantity') ?></th>
            <td><?= $this->Number->format($orderFulfilment->pending_quantity) ?></td>
        </tr>
    </table>
</div>
