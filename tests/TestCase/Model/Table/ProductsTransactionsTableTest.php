<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsTransactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsTransactionsTable Test Case
 */
class ProductsTransactionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsTransactionsTable
     */
    public $ProductsTransactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.products_transactions',
        'app.products',
        'app.transactions',
        'app.customers',
        'app.sales_outlets',
        'app.staffs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductsTransactions') ? [] : ['className' => 'App\Model\Table\ProductsTransactionsTable'];
        $this->ProductsTransactions = TableRegistry::get('ProductsTransactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsTransactions);

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
