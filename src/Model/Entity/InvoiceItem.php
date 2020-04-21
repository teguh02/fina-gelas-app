<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoiceItem Entity
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $item_id
 * @property int $quantity
 * @property float $unit_price
 * @property float|null $standard_unit_price
 * @property int $sent
 * @property int|null $orderFulfilment_id
 *
 * @property \App\Model\Entity\Invoice $invoice
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\OrderFulfilment $order_fulfilment
 */
class InvoiceItem extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'invoice_id' => true,
        'item_id' => true,
        'quantity' => true,
        'unit_price' => true,
        'standard_unit_price' => true,
        'sent' => true,
        'orderFulfilment_id' => true,
        'invoice' => true,
        'item' => true,
        'order_fulfilment' => true
    ];
}
