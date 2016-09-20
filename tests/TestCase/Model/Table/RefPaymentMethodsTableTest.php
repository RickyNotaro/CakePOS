<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefPaymentMethodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefPaymentMethodsTable Test Case
 */
class RefPaymentMethodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefPaymentMethodsTable
     */
    public $RefPaymentMethods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ref_payment_methods'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RefPaymentMethods') ? [] : ['className' => 'App\Model\Table\RefPaymentMethodsTable'];
        $this->RefPaymentMethods = TableRegistry::get('RefPaymentMethods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RefPaymentMethods);

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
