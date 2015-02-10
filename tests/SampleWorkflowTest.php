<?php
namespace beeare\MockingStubbing;
 
class SampleWorkflowTest extends \PHPUnit_Framework_TestCase
{
	public function testServiceCallUpdatesObject()
	{
		$service = $this->getMockBuilder('beeare\MockingStubbing\Service')
			->enableProxyingToOriginalMethods()
			->getMock();
						
		$service->expects($this->once())
			->method('doWork');
		
		$backend = new Backend();
		$workflow = new SampleWorkflow($backend, $service);
		$workflow->execute(new Request(array('id' => 2204)));
	}
}