<?php

/**
 * This is the model class for table "agent_building_assign".
 *
 * The followings are the available columns in table 'agent_building_assign':
 * @property integer $assign_id
 * @property integer $agent_id
 * @property integer $building_id
 * @property string $assign_datetime
 *
 * The followings are the available model relations:
 * @property Agent $agent
 * @property Building $building
 */
class AgentBuildingAssign extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agent_building_assign';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent_id, building_id, assign_datetime', 'required'),
			array('agent_id, building_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('assign_id, agent_id, building_id, assign_datetime', 'safe', 'on'=>'search'),
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
			'agent' => array(self::BELONGS_TO, 'Agent', 'agent_id'),
			'building' => array(self::BELONGS_TO, 'Building', 'building_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'assign_id' => 'Assign',
			'agent_id' => 'Agent',
			'building_id' => 'Building',
			'assign_datetime' => 'Assign Datetime',
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

		$criteria->compare('assign_id',$this->assign_id);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('building_id',$this->building_id);
		$criteria->compare('assign_datetime',$this->assign_datetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AgentBuildingAssign the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
