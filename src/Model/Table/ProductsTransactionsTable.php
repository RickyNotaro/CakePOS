<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsTransactions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $SalesTransactions
 *
 * @method \App\Model\Entity\ProductsTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsTransaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsTransaction findOrCreate($search, callable $callback = null)
 */
class ProductsTransactionsTable extends Table
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

        $this->table('products_transactions');
        $this->displayField('product_id');
        $this->primaryKey(['product_id', 'sales_transaction_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SalesTransactions', [
            'foreignKey' => 'sales_transaction_id',
            'joinType' => 'INNER'
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['sales_transaction_id'], 'SalesTransactions'));

        return $rules;
    }
}
