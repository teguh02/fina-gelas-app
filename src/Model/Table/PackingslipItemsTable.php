<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PackingslipItems Model
 *
 * @property \App\Model\Table\PackingSlipsTable&\Cake\ORM\Association\BelongsTo $PackingSlips
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\OrderFulfilmentsTable&\Cake\ORM\Association\BelongsTo $OrderFulfilments
 *
 * @method \App\Model\Entity\PackingslipItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PackingslipItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PackingslipItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PackingslipItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PackingslipItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PackingslipItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PackingslipItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PackingslipItem findOrCreate($search, callable $callback = null, $options = [])
 */
class PackingslipItemsTable extends Table
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

        $this->setTable('packingslip_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PackingSlips', [
            'foreignKey' => 'packingSlip_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OrderFulfilments', [
            'foreignKey' => 'orderFulfilment_id'
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
            ->nonNegativeInteger('quantity')
            ->allowEmptyString('quantity');

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
        $rules->add($rules->existsIn(['packingSlip_id'], 'PackingSlips'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['orderFulfilment_id'], 'OrderFulfilments'));

        return $rules;
    }
}
