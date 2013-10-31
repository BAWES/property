<?php

/**
 * This is the model class for table "tenant".
 *
 * The followings are the available columns in table 'tenant':
 * @property integer $tenant_id
 * @property string $tenant_name
 * @property string $tenant_email
 * @property string $tenant_password
 * @property string $tenant_civil_id
 * @property string $tenant_marital_status
 * @property integer $tenant_number_ppl
 * @property string $tenant_passport_num
 * @property string $tenant_employer_detail
 * @property string $tenant_phone1
 * @property string $tenant_phone2
 * @property string $tenant_phone3
 * @property string $tenant_phone4
 *
 * The followings are the available model relations:
 * @property Contract[] $contracts
 * @property TenantFile[] $tenantFiles
 */
class Tenant extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tenant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tenant_name, tenant_email, tenant_password, tenant_civil_id, tenant_marital_status, tenant_number_ppl, tenant_passport_num, tenant_employer_detail, tenant_phone1, tenant_phone2, tenant_phone3, tenant_phone4', 'required'),
			array('tenant_number_ppl', 'numerical', 'integerOnly'=>true),
			array('tenant_name', 'length', 'max'=>200),
			array('tenant_email, tenant_password', 'length', 'max'=>128),
			array('tenant_civil_id, tenant_passport_num', 'length', 'max'=>80),
			array('tenant_marital_status', 'length', 'max'=>7),
			array('tenant_phone1, tenant_phone2, tenant_phone3, tenant_phone4', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tenant_id, tenant_name, tenant_email, tenant_password, tenant_civil_id, tenant_marital_status, tenant_number_ppl, tenant_passport_num, tenant_employer_detail, tenant_phone1, tenant_phone2, tenant_phone3, tenant_phone4', 'safe', 'on'=>'search'),
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
			'contracts' => array(self::HAS_MANY, 'Contract', 'tenant_id'),
			'tenantFiles' => array(self::HAS_MANY, 'TenantFile', 'tenant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tenant_id' => 'Tenant',
			'tenant_name' => 'Tenant Name',
			'tenant_email' => 'Tenant Email',
			'tenant_password' => 'Tenant Password',
			'tenant_civil_id' => 'Tenant Civil',
			'tenant_marital_status' => 'Tenant Marital Status',
			'tenant_number_ppl' => 'Tenant Number Ppl',
			'tenant_passport_num' => 'Tenant Passport Num',
			'tenant_employer_detail' => 'Tenant Employer Detail',
			'tenant_phone1' => 'Tenant Phone1',
			'tenant_phone2' => 'Tenant Phone2',
			'tenant_phone3' => 'Tenant Phone3',
			'tenant_phone4' => 'Tenant Phone4',
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

		$criteria->compare('tenant_id',$this->tenant_id);
		$criteria->compare('tenant_name',$this->tenant_name,true);
		$criteria->compare('tenant_email',$this->tenant_email,true);
		$criteria->compare('tenant_password',$this->tenant_password,true);
		$criteria->compare('tenant_civil_id',$this->tenant_civil_id,true);
		$criteria->compare('tenant_marital_status',$this->tenant_marital_status,true);
		$criteria->compare('tenant_number_ppl',$this->tenant_number_ppl);
		$criteria->compare('tenant_passport_num',$this->tenant_passport_num,true);
		$criteria->compare('tenant_employer_detail',$this->tenant_employer_detail,true);
		$criteria->compare('tenant_phone1',$this->tenant_phone1,true);
		$criteria->compare('tenant_phone2',$this->tenant_phone2,true);
		$criteria->compare('tenant_phone3',$this->tenant_phone3,true);
		$criteria->compare('tenant_phone4',$this->tenant_phone4,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tenant the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
