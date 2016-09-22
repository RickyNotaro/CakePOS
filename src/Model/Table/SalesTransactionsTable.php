<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SalesTransactions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $SalesOutlets
 * @property \Cake\ORM\Association\BelongsTo $Staffs
 * @property \Cake\ORM\Association\HasMany $Payments
 * @property \Cake\ORM\Association\HasMany $ProductsTransactions
 *
 * @method \App\Model\Entity\SalesTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\SalesTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SalesTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SalesTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalesTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SalesTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SalesTransaction findOrCreate($search, callable $callback = null)
 */class SalesTransactionsTable extends Table
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

        $this->table('sales_transactions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SalesOutlets', [
            'foreignKey' => 'sales_outlet_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'sales_transaction_id'
        ]);
        $this->hasMany('ProductsTransactions', [
            'foreignKey' => 'sales_transaction_id'
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
            ->integer('id')            ->allowEmpty('id', 'create');
        $validator
            ->dateTime('transaction_date_time')            ->requirePresence('transaction_date_time', 'create')            ->notEmpty('transaction_date_time');
        $validator
            ->decimal('transaction_wholesale_price')            ->requirePresence('transaction_wholesale_price', 'create')            ->notEmpty('transaction_wholesale_price');
        $validator
            ->decimal('transaction_retail_price')            ->requirePresence('transaction_retail_price', 'create')            ->notEmpty('transaction_retail_price');
        $validator
            ->requirePresence('other_details', 'create')            ->notEmpty('other_details');
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
        $rules->add($rules->existsIn(['sales_outlet_id'], 'SalesOutlets'));
        $rules->add($rules->existsIn(['staff_id'], 'Staffs'));

        return $rules;
    }
}
