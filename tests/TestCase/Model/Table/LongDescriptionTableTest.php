<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LongDescriptionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LongDescriptionTable Test Case
 */
class LongDescriptionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LongDescriptionTable
     */
    protected $LongDescription;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LongDescription',
        'app.Apps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LongDescription') ? [] : ['className' => LongDescriptionTable::class];
        $this->LongDescription = $this->getTableLocator()->get('LongDescription', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LongDescription);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LongDescriptionTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LongDescriptionTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
