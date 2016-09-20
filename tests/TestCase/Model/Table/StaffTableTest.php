<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffTable Test Case
 */
class StaffTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffTable
     */
    public $Staff;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.staff',
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
        $config = TableRegistry::exists('Staff') ? [] : ['className' => 'App\Model\Table\StaffTable'];
        $this->Staff = TableRegistry::get('Staff', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Staff);

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
