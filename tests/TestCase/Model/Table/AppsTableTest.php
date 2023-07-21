<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppsTable Test Case
 */
class AppsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AppsTable
     */
    protected $Apps;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Apps') ? [] : ['className' => AppsTable::class];
        $this->Apps = $this->getTableLocator()->get('Apps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Apps);

        parent::tearDown();
    }
}
