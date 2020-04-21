<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PackingslipItem Entity
 *
 * @property int $id
 * @property int $packingSlip_id
 * @property int $item_id
 * @property int|null $quantity
 * @property int|null $orderFulfilment_id
 *
 * @property \App\Model\Entity\PackingSlip $packing_slip
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\OrderFulfilment $order_fulfilment
 */
class PackingslipItem extends Entity
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
        'packingSlip_id' => true,
        'item_id' => true,
        'quantity' => true,
        'orderFulfilment_id' => true,
        'packing_slip' => true,
        'item' => true,
        'order_fulfilment' => true
    ];
}
