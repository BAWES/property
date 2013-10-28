<?php

/**
 * This is the model class for table "unit".
 *
 * The followings are the available columns in table 'unit':
 * @property integer $unit_id
 * @property integer $building_id
 * @property integer $type_id
 * @property string $unit_name
 * @property double $unit_monthly_price
 *
 * The followings are the available model relations:
 * @property Contract[] $contracts
 * @property Building $building
 * @property UnitType $type
 */
class Unit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('building_id, type_id, unit_name, unit_monthly_price', 'required'),
			array('building_id, type_id', 'numerical', 'integerOnly'=>true),
			array('unit_monthly_price', 'numerical'),
			array('unit_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('unit_id, building_id, type_id, unit_name, unit_monthly_price', 'safe', 'on'=>'search'),
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
			'contracts' => array(self::HAS_MANY, 'Contract', 'unit_id'),
			'building' => array(self::BELONGS_TO, 'Building', 'building_id'),
			'type' => array(self::BELONGS_TO, 'UnitType', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'unit_id' => 'Unit',
			'building_id' => 'Building',
			'type_id' => 'Type',
			'unit_name' => 'Unit Name',
			'unit_monthly_price' => 'Unit Monthly Price',
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

		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('building_id',$this->building_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('unit_name',$this->unit_name,true);
		$criteria->compare('unit_monthly_price',$this->unit_monthly_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Unit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
