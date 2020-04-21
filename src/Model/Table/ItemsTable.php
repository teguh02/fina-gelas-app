<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $ItemTypes
 * @property \App\Model\Table\InvoiceItemsTable&\Cake\ORM\Association\HasMany $InvoiceItems
 * @property \App\Model\Table\OrderFulfilmentsTable&\Cake\ORM\Association\HasMany $OrderFulfilments
 * @property \App\Model\Table\PackingslipItemsTable&\Cake\ORM\Association\HasMany $PackingslipItems
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ItemTypes', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('InvoiceItems', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('OrderFulfilments', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('PackingslipItems', [
            'foreignKey' => 'item_id'
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
            ->scalar('item_code')
            ->maxLength('item_code', 45)
            ->requirePresence('item_code', 'create')
            ->notEmptyString('item_code');

        $validator
            ->scalar('item_name')
            ->maxLength('item_name', 100)
            ->requirePresence('item_name', 'create')
            ->notEmptyString('item_name');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 10)
            ->requirePresence('unit', 'create')
            ->notEmptyString('unit');

        $validator
            ->numeric('standard_sell_price_per_unit')
            ->allowEmptyString('standard_sell_price_per_unit');

        $validator
            ->numeric('standard_supplier_price_per_unit')
            ->allowEmptyString('standard_supplier_price_per_unit');

        $validator
            ->numeric('unitsperbox')
            ->allowEmptyString('unitsperbox');

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
        $rules->add($rules->existsIn(['type_id'], 'ItemTypes'));

        return $rules;
    }
}
