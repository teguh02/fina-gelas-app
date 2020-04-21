<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $bank_statement_id
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property string $transaction_note
 * @property float $amount
 * @property string|null $transaction_category
 *
 * @property \App\Model\Entity\BankStatement $bank_statement
 * @property \App\Model\Entity\Payment[] $payments
 */
class Transaction extends Entity
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
        'bank_statement_id' => true,
        'transaction_date' => true,
        'transaction_note' => true,
        'amount' => true,
        'transaction_category' => true,
        'bank_statement' => true,
        'payments' => true
    ];
}
