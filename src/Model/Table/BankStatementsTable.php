<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankStatements Model
 *
 * @method \App\Model\Entity\BankStatement get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankStatement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BankStatement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankStatement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankStatement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankStatement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankStatement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankStatement findOrCreate($search, callable $callback = null, $options = [])
 */
class BankStatementsTable extends Table
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

        $this->setTable('bank_statements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('account_name')
            ->maxLength('account_name', 45)
            ->requirePresence('account_name', 'create')
            ->notEmptyString('account_name');

        $validator
            ->integer('month')
            ->requirePresence('month', 'create')
            ->notEmptyString('month');

        $validator
            ->integer('year')
            ->requirePresence('year', 'create')
            ->notEmptyString('year');

        return $validator;
    }
}
