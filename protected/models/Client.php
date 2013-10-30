<?php

/**
 * This is the model class for table "client".
 *
 * The followings are the available columns in table 'client':
 * @property integer $client_id
 * @property string $client_name
 * @property string $client_email
 * @property string $client_password
 *
 * The followings are the available model relations:
 * @property Building[] $buildings
 */
class Client extends CActiveRecord {

    private $salt = "28b206548469ce62182048fd9cf91760";
    private $oldPassword;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'client';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('client_name, client_email, client_password', 'required'),
            array('client_email','email'),
            array('client_password','rehashPassword','on'=>'update'),
            array('client_name, client_email', 'length', 'max' => 200),
            array('client_password', 'length', 'max' => 128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('client_id, client_name, client_email, client_password', 'safe', 'on' => 'search'),
        );
    }
    
    public function rehashPassword($attribute, $params) {
        if($this->oldPassword != $this->client_password)
            $this->client_password = $this->hashPassword($this->client_password, $this->salt);
    }
    
    protected function afterFind() {
        // store old password for validation
        $this->oldPassword = $this->client_password;

        parent::afterFind();
    }
    
    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord)
                $this->client_password = $this->hashPassword($this->client_password, $this->salt);

            return true;
        }
        else
            return false;
    }

    //checks password param if equals to current users password
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->salt) === $this->client_password;
    }

    //hashes password input using given salt
    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'buildings' => array(self::HAS_MANY, 'Building', 'client_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'client_id' => 'Client',
            'client_name' => 'Client Name',
            'client_email' => 'Client Email',
            'client_password' => 'Client Password',
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

        $criteria->compare('client_id', $this->client_id);
        $criteria->compare('client_name', $this->client_name, true);
        $criteria->compare('client_email', $this->client_email, true);
        $criteria->compare('client_password', $this->client_password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Client the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
