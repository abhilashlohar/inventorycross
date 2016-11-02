<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventoryImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventoryImagesTable Test Case
 */
class InventoryImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InventoryImagesTable
     */
    public $InventoryImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventory_images',
        'app.inventories',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InventoryImages') ? [] : ['className' => 'App\Model\Table\InventoryImagesTable'];
        $this->InventoryImages = TableRegistry::get('InventoryImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InventoryImages);

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
