<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankStatementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankStatementsTable Test Case
 */
class BankStatementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BankStatementsTable
     */
    public $BankStatements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BankStatements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BankStatements') ? [] : ['className' => BankStatementsTable::class];
        $this->BankStatements = TableRegistry::getTableLocator()->get('BankStatements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankStatements);

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
}
