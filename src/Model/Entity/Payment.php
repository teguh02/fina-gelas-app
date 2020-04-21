<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property \Cake\I18n\FrozenDate $payment_date
 * @property float $payment_amount
 * @property string $payment_method
 * @property int|null $transaction_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Transaction $transaction
 */
class Payment extends Entity
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
        'payment_date' => true,
        'payment_amount' => true,
        'payment_method' => true,
        'transaction_id' => true,
        'customer' => true,
        'transaction' => true
    ];
}
