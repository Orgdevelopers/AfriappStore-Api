<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LongDescription Entity
 *
 * @property int $id
 * @property int $app_id
 * @property string $description
 *
 * @property \App\Model\Entity\App $app
 */
class LongDescription extends Entity
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
        'app_id' => true,
        'description' => true,
        'app' => true,
    ];
}
