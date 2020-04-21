<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PackingSlip Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int|null $vehicle_id
 * @property \Cake\I18n\FrozenTime $packing_date
 * @property string $address
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class PackingSlip extends Entity
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
        'customer_id' => true,
        'vehicle_id' => true,
        'packing_date' => true,
        'address' => true,
        'customer' => true,
        'vehicle' => true
    ];
}
