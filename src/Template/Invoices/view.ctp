<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */

use Cake\I18n\I18n;
use Cake\I18n\Time;
use Cake\I18n\Number;

I18n::setLocale('id-ID');
?>

<h3 class="float-left"> Nota (ID komputer)  <?= h($invoice->id) ?></h3>

        <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->id], ['class' => 'float-right ml-2'], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id], ['class' => 'float-right']) ?> </li>

<div class="invoices view large-9 medium-8 columns table-responsive content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Kode Nota') ?></th>
            <td><?= h($invoice->invoice_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $invoice->has('customer') ? $this->Html->link($invoice->customer->name, ['controller' => 'Customers', 'action' => 'view', $invoice->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Tagihan') ?></th>
            <td> Rp <?= $this->Number->format($invoice->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Terkirim') ?></th>
            <td><?= $this->Number->format($invoice->sent) ? "sudah terkirim":"belum terkirim"  ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tanggal') ?></th>
            <td><?=  date_format($invoice->invoice_date,"d M Y") ?></td>
        </tr>
    </table>
    <br>
    <div class="related">
        <h4><?= __('Related Invoice Items') ?></h4>
        <?php if (!empty($invoice->invoice_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Kode Barang') ?></th>
                <th scope="col"><?= __('Nama Barang') ?></th>
                <th scope="col"><?= __('Banyaknya') ?></th>
                <th scope="col"><?= __('Satuan') ?></th>
                <th scope="col"><?= __('Harga Satuan') ?></th>
                <th scope="col"><?= __('Total Harga') ?></th>
                <th scope="col"><?= __('Terkirim') ?></th>
            </tr>
            <?php foreach ($invoice->invoice_items as $invoiceItems): ?>
            <tr>
                <td><?= h($invoiceItems->item->item_code) ?></td>
                <td><?= h($invoiceItems->item->item_name) ?></td>
                <td><?= h($invoiceItems->quantity) ?></td>
                <td><?= h($invoiceItems->item->unit) ?></td>
                <td> Rp <?= $this->Number->format($invoiceItems->unit_price) ?></td>
                <td> Rp <?= $this->Number->format($invoiceItems->quantity*$invoiceItems->unit_price) ?></td>
                <td> <?= $this->Number->format($invoiceItems->sent) ? "sudah terkirim":"belum terkirim"  ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
