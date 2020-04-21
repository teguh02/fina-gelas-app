<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $item_code
 * @property string $item_name
 * @property int $type_id
 * @property string $unit
 * @property float|null $standard_sell_price
 * @property float|null $standard_supplier_price
 * @property float|null $unitsperbox
 *
 * @property \App\Model\Entity\InvoiceItem[] $invoice_items
 * @property \App\Model\Entity\OrderFulfilment[] $order_fulfilments
 * @property \App\Model\Entity\PackingslipItem[] $packingslip_items
 */
class Item extends Entity
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
        'item_code' => true,
        'item_name' => true,
        'type_id' => true,
        'unit' => true,
        'standard_sell_price_per_unit' => true,
        'standard_supplier_price_per_unit' => true,
        'unitsperbox' => true,
        'invoice_items' => true,
        'order_fulfilments' => true,
        'packingslip_items' => true
    ];
}
