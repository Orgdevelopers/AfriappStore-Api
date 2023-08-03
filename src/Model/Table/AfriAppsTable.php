<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AfriApps Model
 *
 * @method \App\Model\Entity\AfriApp newEmptyEntity()
 * @method \App\Model\Entity\AfriApp newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AfriApp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AfriApp get($primaryKey, $options = [])
 * @method \App\Model\Entity\AfriApp findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AfriApp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AfriApp[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AfriApp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AfriApp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AfriApp[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AfriApp[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AfriApp[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AfriApp[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AfriAppsTable extends Table
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

        $this->setTable('afri_apps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('app_name')
            ->maxLength('app_name', 100)
            ->requirePresence('app_name', 'create')
            ->notEmptyString('app_name');

        $validator
            ->scalar('app_icon')
            ->maxLength('app_icon', 255)
            ->requirePresence('app_icon', 'create')
            ->notEmptyString('app_icon');

        $validator
            ->scalar('version')
            ->maxLength('version', 50)
            ->requirePresence('version', 'create')
            ->notEmptyString('version');

        $validator
            ->scalar('description')
            ->maxLength('description', 2000)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('size')
            ->maxLength('size', 50)
            ->requirePresence('size', 'create')
            ->notEmptyString('size');

        $validator
            ->integer('downloads')
            ->requirePresence('downloads', 'create')
            ->notEmptyString('downloads');

        $validator
            ->scalar('download_link')
            ->maxLength('download_link', 255)
            ->requirePresence('download_link', 'create')
            ->notEmptyString('download_link');

        $validator
            ->scalar('tags')
            ->maxLength('tags', 255)
            ->requirePresence('tags', 'create')
            ->notEmptyString('tags');

        $validator
            ->scalar('rating')
            ->maxLength('rating', 100)
            ->requirePresence('rating', 'create')
            ->notEmptyString('rating');

        $validator
            ->scalar('package_name')
            ->maxLength('package_name', 255)
            ->requirePresence('package_name', 'create')
            ->notEmptyString('package_name');

        $validator
            ->scalar('status')
            ->maxLength('status', 100)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('owner_id')
            ->requirePresence('owner_id', 'create')
            ->notEmptyString('owner_id');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->scalar('category')
            ->maxLength('category', 255)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        return $validator;
    }
}
