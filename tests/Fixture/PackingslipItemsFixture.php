<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PackingslipItemsFixture
 */
class PackingslipItemsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'packingSlip_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'item_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'orderFulfilment_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'packingSlipdetails_fk_idx' => ['type' => 'index', 'columns' => ['packingSlip_id'], 'length' => []],
            'packingslipitems_fk_idx' => ['type' => 'index', 'columns' => ['item_id'], 'length' => []],
            'pakcingSlip_to_orderFulfilment_fk_idx' => ['type' => 'index', 'columns' => ['orderFulfilment_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'packingSlipdetails_fk' => ['type' => 'foreign', 'columns' => ['packingSlip_id'], 'references' => ['packing_slips', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'packingslipitems_fk' => ['type' => 'foreign', 'columns' => ['item_id'], 'references' => ['items', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pakcingSlip_to_orderFulfilment_fk' => ['type' => 'foreign', 'columns' => ['orderFulfilment_id'], 'references' => ['order_fulfilments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'packingSlip_id' => 1,
                'item_id' => 1,
                'quantity' => 1,
                'orderFulfilment_id' => 1
            ],
        ];
        parent::init();
    }
}
