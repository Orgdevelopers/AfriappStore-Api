<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * App Entity
 *
 * @property int $id
 * @property string $app_name
 * @property string $app_icon
 * @property string $version
 * @property string $description
 * @property string $size
 * @property int $downloads
 * @property string $download_link
 * @property string $tags
 * @property string $rating
 * @property string $package_name
 * @property string $status
 * @property int $owner_id
 * @property \Cake\I18n\FrozenTime $created_at
 */
class App extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'app_name' => true,
        'app_icon' => true,
        'version' => true,
        'description' => true,
        'size' => true,
        'downloads' => true,
        'download_link' => true,
        'tags' => true,
        'rating' => true,
        'package_name' => true,
        'status' => true,
        'owner_id' => true,
        'created_at' => true,
    ];
}
