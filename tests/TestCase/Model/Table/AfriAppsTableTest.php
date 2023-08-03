<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AfriAppsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AfriAppsTable Test Case
 */
class AfriAppsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AfriAppsTable
     */
    protected $AfriApps;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AfriApps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AfriApps') ? [] : ['className' => AfriAppsTable::class];
        $this->AfriApps = $this->getTableLocator()->get('AfriApps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AfriApps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AfriAppsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
