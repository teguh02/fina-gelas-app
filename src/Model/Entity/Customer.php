<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $location
 * @property float|null $receivables
 *
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\OrderFulfilment[] $order_fulfilments
 * @property \App\Model\Entity\PackingSlip[] $packing_slips
 * @property \App\Model\Entity\Payment[] $payments
 */
class Customer extends Entity
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
        'name' => true,
        'location' => true,
        'receivables' => true,
        'invoices' => true,
        'order_fulfilments' => true,
        'packing_slips' => true,
        'payments' => true
    ];
}
