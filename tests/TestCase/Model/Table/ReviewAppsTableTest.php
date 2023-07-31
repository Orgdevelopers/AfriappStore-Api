<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReviewAppsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReviewAppsTable Test Case
 */
class ReviewAppsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReviewAppsTable
     */
    protected $ReviewApps;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ReviewApps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ReviewApps') ? [] : ['className' => ReviewAppsTable::class];
        $this->ReviewApps = $this->getTableLocator()->get('ReviewApps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ReviewApps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReviewAppsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
