<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReviewAppsFixture
 */
class ReviewAppsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'app_name' => 'Lorem ipsum dolor sit amet',
                'app_icon' => 'Lorem ipsum dolor sit amet',
                'version' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'long_description' => 'Lorem ipsum dolor sit amet',
                'size' => 'Lorem ipsum dolor sit amet',
                'downloads' => 1,
                'download_link' => 'Lorem ipsum dolor sit amet',
                'tags' => 'Lorem ipsum dolor sit amet',
                'rating' => 'Lorem ipsum dolor sit amet',
                'package_name' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'owner_id' => 1,
                'created_at' => 1690725413,
            ],
        ];
        parent::init();
    }
}
