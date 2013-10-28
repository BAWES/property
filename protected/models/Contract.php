<?php

/**
 * This is the model class for table "contract".
 *
 * The followings are the available columns in table 'contract':
 * @property integer $contract_id
 * @property integer $tenant_id
 * @property integer $unit_id
 * @property string $contract_start_date
 * @property string $contract_end_date
 * @property integer $contract_notice_period
 * @property string $contract_cancellation
 *
 * The followings are the available model relations:
 * @property Tenant $tenant
 * @property Unit $unit
 * @property Invoice[] $invoices
 */
class Contract extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contract';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant_id, unit_id, contract_start_date, contract_end_date, contract_notice_period', 'required'),
			array('tenant_id, unit_id, contract_notice_period', 'numerical', 'integerOnly'=>true),
			array('contract_cancellation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('contract_id, tenant_id, unit_id, contract_start_date, contract_end_date, contract_notice_period, contract_cancellation', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tenant' => array(self::BELONGS_TO, 'Tenant', 'tenant_id'),
			'unit' => array(self::BELONGS_TO, 'Unit', 'unit_id'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'contract_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contract_id' => 'Contract',
			'tenant_id' => 'Tenant',
			'unit_id' => 'Unit',
			'contract_start_date' => 'Contract Start Date',
			'contract_end_date' => 'Contract End Date',
			'contract_notice_period' => 'Contract Notice Period',
			'contract_cancellation' => 'Contract Cancellation',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('contract_id',$this->contract_id);
		$criteria->compare('tenant_id',$this->tenant_id);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('contract_start_date',$this->contract_start_date,true);
		$criteria->compare('contract_end_date',$this->contract_end_date,true);
		$criteria->compare('contract_notice_period',$this->contract_notice_period);
		$criteria->compare('contract_cancellation',$this->contract_cancellation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contract the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
