<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LongDescription Model
 *
 * @property \App\Model\Table\AppsTable&\Cake\ORM\Association\BelongsTo $Apps
 *
 * @method \App\Model\Entity\LongDescription newEmptyEntity()
 * @method \App\Model\Entity\LongDescription newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LongDescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LongDescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\LongDescription findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LongDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LongDescription[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LongDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LongDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LongDescription[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LongDescription[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LongDescription[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LongDescription[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LongDescriptionTable extends Table
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

        $this->setTable('long_description');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Apps', [
            'foreignKey' => 'app_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('app_id')
            ->notEmptyString('app_id');

        $validator
            ->scalar('description')
            ->maxLength('description', 2000)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('app_id', 'Apps'), ['errorField' => 'app_id']);

        return $rules;
    }
}
