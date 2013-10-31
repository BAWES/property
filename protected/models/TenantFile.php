<?php

/**
 * This is the model class for table "tenant_file".
 *
 * The followings are the available columns in table 'tenant_file':
 * @property integer $file_id
 * @property integer $tenant_id
 * @property string $file_name
 * @property string $file_desc
 *
 * The followings are the available model relations:
 * @property Tenant $tenant
 */
class TenantFile extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tenant_file';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tenant_id, file_desc', 'required'),
            array('tenant_id', 'numerical', 'integerOnly' => true),
            array('file_name', 'file', 'allowEmpty' => false, 'on' => 'create'),
            array('file_name', 'file', 'allowEmpty' => true, 'on' => 'update'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('file_id, tenant_id, file_name, file_desc', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tenant' => array(self::BELONGS_TO, 'Tenant', 'tenant_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'file_id' => 'File',
            'tenant_id' => 'Tenant',
            'file_name' => 'File Name',
            'file_desc' => 'File Desc',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('file_id', $this->file_id);
        $criteria->compare('tenant_id', $this->tenant_id);
        $criteria->compare('file_name', $this->file_name, true);
        $criteria->compare('file_desc', $this->file_desc, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TenantFile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
