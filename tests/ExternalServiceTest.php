<?php
namespace beeare\MockingStubbing;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class ExternalServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testSendSomethingAndGetSomething()
    {
        $object = new ExternalService();
        $object->sendSomething('Testing');
        $this->assertEquals('Tested!', $object->getSomething());
    }
}
