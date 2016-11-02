<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CityStates Model
 *
 * @method \App\Model\Entity\CityState get($primaryKey, $options = [])
 * @method \App\Model\Entity\CityState newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CityState[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CityState|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CityState patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CityState[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CityState findOrCreate($search, callable $callback = null)
 */
class CityStatesTable extends Table
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

        $this->table('city_states');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->requirePresence('district', 'create')
            ->notEmpty('district');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        return $validator;
    }
}
