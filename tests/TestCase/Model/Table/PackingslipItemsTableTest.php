<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PackingslipItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PackingslipItemsTable Test Case
 */
class PackingslipItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PackingslipItemsTable
     */
    public $PackingslipItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PackingslipItems',
        'app.PackingSlips',
        'app.Items',
        'app.OrderFulfilments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PackingslipItems') ? [] : ['className' => PackingslipItemsTable::class];
        $this->PackingslipItems = TableRegistry::getTableLocator()->get('PackingslipItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PackingslipItems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
