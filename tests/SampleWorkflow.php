<?php
namespace beeare\MockingStubbing;
 
class SampleWorkflow
{	
	private $backend;
	private $service;
	
	public function __construct(Backend $backend, Service $service)
	{
		$this->backend = $backend;
		$this->service = $service;
	}
	
	public function execute(Request $request)
	{
		$this->service->doWork(
			$this->backend->getObjectById($request->getValue('id'))
		);
	}
}
