<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SetorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SetorsTable Test Case
 */
class SetorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SetorsTable
     */
    public $Setors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.setors',
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
        $config = TableRegistry::exists('Setors') ? [] : ['className' => SetorsTable::class];
        $this->Setors = TableRegistry::get('Setors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Setors);

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
