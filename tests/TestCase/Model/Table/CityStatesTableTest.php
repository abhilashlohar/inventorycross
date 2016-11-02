<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CityStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CityStatesTable Test Case
 */
class CityStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CityStatesTable
     */
    public $CityStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('CityStates') ? [] : ['className' => 'App\Model\Table\CityStatesTable'];
        $this->CityStates = TableRegistry::get('CityStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CityStates);

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
