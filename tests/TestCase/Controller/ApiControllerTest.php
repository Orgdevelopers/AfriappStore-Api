<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ApiController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ApiController Test Case
 *
 * @uses \App\Controller\ApiController
 */
class ApiControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Api',
    ];
}
