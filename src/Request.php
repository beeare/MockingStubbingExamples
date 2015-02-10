<?php
namespace beeare\MockingStubbing;

class Request
{
	private $parameters;
	
	public function __construct(array $parameters)
	{
		$this->parameters = $parameters;
	}
	
	public function getValue($key)
	{
		return isset($this->parameters[$key]) ? $this->parameters[$key] : null;
	}
}
