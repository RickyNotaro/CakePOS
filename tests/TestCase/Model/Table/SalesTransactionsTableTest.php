<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesTransactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesTransactionsTable Test Case
 */
class SalesTransactionsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\SalesTransactionsTable     */
    public $SalesTransactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sales_transactions',
        'app.customers',
        'app.sales_outlets',
        'app.staffs',
        'app.payments',
        'app.products_transactions',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SalesTransactions') ? [] : ['className' => 'App\Model\Table\SalesTransactionsTable'];        $this->SalesTransactions = TableRegistry::get('SalesTransactions', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalesTransactions);

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
