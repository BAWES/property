<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$adminRecord = Admin::model()->findByAttributes(array('admin_email'=>$this->username));
		
		if($adminRecord===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID; 
		else if(!$adminRecord->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID; 
		else
		{
			$this->_id=$adminRecord->admin_id; 
			$this->setState('name', $adminRecord->admin_name); 
			//user type
			$this->setState('ut','admin');
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId() 
	{
		return $this->_id; 
	}
	
}