<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>

<h3 class="float-left"><?= h($item->id) ?></h3>

<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['class' => 'float-right ml-2'], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
<li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id], ['class' => 'float-right']) ?> </li>


<div class="items view large-9 medium-8 columns content">

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item Code') ?></th>
            <td><?= h($item->item_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item Name') ?></th>
            <td><?= h($item->item_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= h($item->unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Id') ?></th>
            <td><?= $item->has('itemType') ? $this->Html->link($item->itemType->name, ['controller' => 'ItemTypes', 'action' => 'view', $item->itemType->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Standard_sell_price_per_unit') ?></th>
            <td><?= $this->Number->format($item->standard_sell_price_per_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Standard_supplier_price_per_unit') ?></th>
            <td><?= $this->Number->format($item->standard_supplier_price_per_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unitsperbox') ?></th>
            <td><?= $this->Number->format($item->unitsperbox) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Boxperunit') ?></th>
            <td><?= $this->Number->format($item->boxperunit) ?></td>
        </tr>
    </table>
    <br>
    <div class="related">
        <h4><?= __('Related Invoice Items') ?></h4>
        <br>
        <?php if (!empty($item->invoice_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Invoice Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Unit Price') ?></th>
                <th scope="col"><?= __('Standard Unit Price') ?></th>
                <th scope="col"><?= __('Sent') ?></th>
                <th scope="col"><?= __('OrderFulfilment Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->invoice_items as $invoiceItems): ?>
            <tr>
                <td><?= h($invoiceItems->id) ?></td>
                <td><?= h($invoiceItems->invoice_id) ?></td>
                <td><?= h($invoiceItems->item_id) ?></td>
                <td><?= h($invoiceItems->quantity) ?></td>
                <td><?= h($invoiceItems->unit_price) ?></td>
                <td><?= h($invoiceItems->standard_unit_price) ?></td>
                <td><?= h($invoiceItems->sent) ?></td>
                <td><?= h($invoiceItems->orderFulfilment_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceItems', 'action' => 'view', $invoiceItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceItems', 'action' => 'edit', $invoiceItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceItems', 'action' => 'delete', $invoiceItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Fulfilments') ?></h4>
        <br>
        <?php if (!empty($item->order_fulfilments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Pending Quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->order_fulfilments as $orderFulfilments): ?>
            <tr>
                <td><?= h($orderFulfilments->id) ?></td>
                <td><?= h($orderFulfilments->customer_id) ?></td>
                <td><?= h($orderFulfilments->item_id) ?></td>
                <td><?= h($orderFulfilments->pending_quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderFulfilments', 'action' => 'view', $orderFulfilments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderFulfilments', 'action' => 'edit', $orderFulfilments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderFulfilments', 'action' => 'delete', $orderFulfilments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderFulfilments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Packingslip Items') ?></h4>
        <br>
        <?php if (!empty($item->packingslip_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('PackingSlip Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('OrderFulfilment Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->packingslip_items as $packingslipItems): ?>
            <tr>
                <td><?= h($packingslipItems->id) ?></td>
                <td><?= h($packingslipItems->packingSlip_id) ?></td>
                <td><?= h($packingslipItems->item_id) ?></td>
                <td><?= h($packingslipItems->quantity) ?></td>
                <td><?= h($packingslipItems->orderFulfilment_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PackingslipItems', 'action' => 'view', $packingslipItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PackingslipItems', 'action' => 'edit', $packingslipItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PackingslipItems', 'action' => 'delete', $packingslipItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packingslipItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
