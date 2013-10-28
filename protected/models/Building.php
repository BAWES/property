<?php

/**
 * This is the model class for table "building".
 *
 * The followings are the available columns in table 'building':
 * @property integer $building_id
 * @property integer $client_id
 * @property integer $area_id
 * @property string $building_name
 * @property string $building_address
 *
 * The followings are the available model relations:
 * @property AgentBuildingAssign[] $agentBuildingAssigns
 * @property Client $client
 * @property Area $area
 * @property Unit[] $units
 */
class Building extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'building';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id, area_id, building_name, building_address', 'required'),
			array('client_id, area_id', 'numerical', 'integerOnly'=>true),
			array('building_name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('building_id, client_id, area_id, building_name, building_address', 'safe', 'on'=>'search'),
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
			'agentBuildingAssigns' => array(self::HAS_MANY, 'AgentBuildingAssign', 'building_id'),
			'client' => array(self::BELONGS_TO, 'Client', 'client_id'),
			'area' => array(self::BELONGS_TO, 'Area', 'area_id'),
			'units' => array(self::HAS_MANY, 'Unit', 'building_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'building_id' => 'Building',
			'client_id' => 'Client',
			'area_id' => 'Area',
			'building_name' => 'Building Name',
			'building_address' => 'Building Address',
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

		$criteria->compare('building_id',$this->building_id);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('building_name',$this->building_name,true);
		$criteria->compare('building_address',$this->building_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Building the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
