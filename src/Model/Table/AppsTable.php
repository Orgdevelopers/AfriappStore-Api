<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apps Model
 *
 * @method \App\Model\Entity\App newEmptyEntity()
 * @method \App\Model\Entity\App newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\App[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\App get($primaryKey, $options = [])
 * @method \App\Model\Entity\App findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\App patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\App[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\App|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\App saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\App[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AppsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {


        parent::initialize($config);

        $this->setTable('apps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addAssociations([
            'belongsTo' => [
                'Users' => [
                    'className' => 'Users',
                    'foreignKey' => 'owner_id'
                    ]
            ],
            'hasMany' => [
                'Reviews' => [
                    'className' => 'Reviews',
                    'foreignKey' => 'app_id'
                ],
                'AppImages' => [
                    'className' => 'AppImages',
                    'foreignKey' => 'app_id'
                ],
            ],

            'hasOne'  => [
                'LongDescription' => [
                    'className' => 'LongDescription',
                    'foreignKey' => 'app_id'
                ]
            ]
            // 'belongsToMany' => ['Tags']
        ]);

    }
}
