<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PackingSlips Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\PackingSlip get($primaryKey, $options = [])
 * @method \App\Model\Entity\PackingSlip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PackingSlip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PackingSlip|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PackingSlip saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PackingSlip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PackingSlip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PackingSlip findOrCreate($search, callable $callback = null, $options = [])
 */
class PackingSlipsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('packing_slips');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('packing_date')
            ->requirePresence('packing_date', 'create')
            ->notEmptyDateTime('packing_date');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));

        return $rules;
    }
}
