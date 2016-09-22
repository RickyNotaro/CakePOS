<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staffs Model
 *
 * @property \Cake\ORM\Association\HasMany $SalesTransactions
 *
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class StaffsTable extends Table
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

        $this->table('staffs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('SalesTransactions', [
            'foreignKey' => 'staff_id'
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
            ->requirePresence('username', 'create')            ->notEmpty('username')            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
        $validator
            ->email('email')            ->requirePresence('email', 'create')            ->notEmpty('email')            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
        $validator
            ->requirePresence('password', 'create')            ->notEmpty('password');
        $validator
            ->requirePresence('first_name', 'create')            ->notEmpty('first_name');
        $validator
            ->requirePresence('last_name', 'create')            ->notEmpty('last_name');
        $validator
            ->requirePresence('role', 'create')            ->notEmpty('role');
        $validator
            ->allowEmpty('notes');

            $validator
        ->notEmpty('username', "Un nom d'utilisateur est nécessaire")
        ->notEmpty('password', 'Un mot de passe est nécessaire')
        ->notEmpty('role', __("A role is neccessary"))
        ->add('role', 'inList', [
             'rule' => ['inList', ['gestionnaire', 'employe']],
              'message' => 'Merci de rentrer un role valide'
        ]);
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
