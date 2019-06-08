<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StockJournals Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\InwardsTable|\Cake\ORM\Association\HasMany $Inwards
 * @property \App\Model\Table\OutwardsTable|\Cake\ORM\Association\HasMany $Outwards
 *
 * @method \App\Model\Entity\StockJournal get($primaryKey, $options = [])
 * @method \App\Model\Entity\StockJournal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StockJournal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StockJournal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StockJournal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StockJournal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StockJournal findOrCreate($search, callable $callback = null, $options = [])
 */
class StockJournalsTable extends Table
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

        $this->setTable('stock_journals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Inwards', [
            'foreignKey' => 'stock_journal_id',
			'saveStrategy' => 'replace'
        ]);
        $this->hasMany('Outwards', [
            'foreignKey' => 'stock_journal_id',
			'saveStrategy' => 'replace'
        ]);
		$this->hasMany('ItemLedgers', [
            'foreignKey' => 'stock_journal_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

       /* $validator
            ->integer('voucher_no')
            ->requirePresence('voucher_no', 'create')
            ->notEmpty('voucher_no');*/

        $validator
            ->date('transaction_date')
            ->requirePresence('transaction_date', 'create')
            ->notEmpty('transaction_date');

        

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
