<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentsTable Test Case
 */
class PaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentsTable
     */
    public $Payments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.payments',
        'app.sales_transactions',
        'app.customers',
        'app.sales_outlets',
        'app.staffs',
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
        $config = TableRegistry::exists('Payments') ? [] : ['className' => 'App\Model\Table\PaymentsTable'];
        $this->Payments = TableRegistry::get('Payments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Payments);

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
