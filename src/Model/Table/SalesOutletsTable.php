<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SalesOutlets Model
 *
 * @property \Cake\ORM\Association\HasMany $SalesTransactions
 *
 * @method \App\Model\Entity\SalesOutlet get($primaryKey, $options = [])
 * @method \App\Model\Entity\SalesOutlet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SalesOutlet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SalesOutlet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalesOutlet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SalesOutlet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SalesOutlet findOrCreate($search, callable $callback = null)
 */
class SalesOutletsTable extends Table
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

        $this->table('sales_outlets');
        $this->displayField('sales_outlet_detail');
        $this->primaryKey('id');

        $this->hasMany('SalesTransactions', [
            'foreignKey' => 'sales_outlet_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('sales_outlet_detail', 'create')
            ->notEmpty('sales_outlet_detail');

        return $validator;
    }
}
