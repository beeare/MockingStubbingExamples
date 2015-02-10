<?php
namespace beeare\MockingStubbing;

class User
{
	private $hasher;
	private $password;
	
	public function __construct(Hasher $hasher)
	{
		$this->hasher = $hasher;
	}
	
	public function setPassword($password)
	{
		$this->password = $this->hasher->generateHash($password);
	}
	
	public function getPassword()
	{
		return $this->password;
	}
}