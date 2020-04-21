<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property string|null $invoice_code
 * @property int $customer_id
 * @property \Cake\I18n\FrozenDate $invoice_date
 * @property float $amount
 * @property int $sent
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\InvoiceItem[] $invoice_items
 */
class Invoice extends Entity
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
        'invoice_code' => true,
        'customer_id' => true,
        'invoice_date' => true,
        'amount' => true,
        'sent' => true,
        'customer' => true,
        'invoice_items' => true
    ];
}
