<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyContactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyContactsTable Test Case
 */
class CompanyContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyContactsTable
     */
    public $CompanyContacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.company_contacts',
        'app.companies',
        'app.city_states'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CompanyContacts') ? [] : ['className' => 'App\Model\Table\CompanyContactsTable'];
        $this->CompanyContacts = TableRegistry::get('CompanyContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompanyContacts);

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
