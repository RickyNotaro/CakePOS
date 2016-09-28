<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefPaymentMethods Model
 *
 * @method \App\Model\Entity\RefPaymentMethod get($primaryKey, $options = [])
 * @method \App\Model\Entity\RefPaymentMethod newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RefPaymentMethod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RefPaymentMethod|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefPaymentMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RefPaymentMethod[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RefPaymentMethod findOrCreate($search, callable $callback = null)
 */
class RefPaymentMethodsTable extends Table
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

        $this->table('ref_payment_methods');
        $this->displayField('payment_method_name');
        $this->primaryKey('payment_method_code');
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
            ->integer('payment_method_code')
            ->notEmpty('payment_method_code', 'create');

        $validator
            ->requirePresence('payment_method_name', 'create')
            ->notEmpty('payment_method_name');

        $validator
            ->requirePresence('payment_method_description', 'create')
            ->notEmpty('payment_method_description');

        return $validator;
    }
}
