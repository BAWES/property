<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $admin_email
 * @property string $admin_password
 */
class Admin extends CActiveRecord {

    private $salt = "28b206548469ce62182048fd9cf91760";

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'admin';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('admin_name, admin_email, admin_password', 'required'),
            array('admin_email','email'),
            array('admin_password','rehashPassword','on'=>'changePw'),
            array('admin_name, admin_email', 'length', 'max' => 200),
            array('admin_password', 'length', 'max' => 128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('admin_id, admin_name, admin_email, admin_password', 'safe', 'on' => 'search'),
        );
    }
    
    public function rehashPassword($attribute, $params) {
        $this->admin_password = $this->hashPassword($this->admin_password, $this->salt);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord)
                $this->admin_password = $this->hashPassword($this->admin_password, $this->salt);

            return true;
        }
        else
            return false;
    }

    //checks password param if equals to current users password
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->salt) === $this->admin_password;
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'admin_id' => 'Admin',
            'admin_name' => 'Admin Name',
            'admin_email' => 'Admin Email',
            'admin_password' => 'Admin Password',
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

        $criteria->compare('admin_id', $this->admin_id);
        $criteria->compare('admin_name', $this->admin_name, true);
        $criteria->compare('admin_email', $this->admin_email, true);
        $criteria->compare('admin_password', $this->admin_password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Admin the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
