<?php
namespace beeare\MockingStubbing;

use Mockery as M;

/**
 * @see https://github.com/padraic/mockery/blob/master/docs/cookbook/mocking_hard_dependencies.rst
 * @see https://github.com/padraic/mockery/blob/master/docs/reference/instance_mocking.rst
 */
class InternalServiceTest
    extends \PHPUnit_Framework_TestCase
    //extends M\Adapter\Phpunit\MockeryTestCase
{
    //use M\Adapter\Phpunit\MockeryPHPUnitIntegration;

    public function testCallingExternalService()
    {
        $param = 'Testing';

        $externalMock = M::mock('overload:beeare\MockingStubbing\ExternalService');
        $externalMock->shouldReceive('sendSomething')
            ->once()
            ->with($param);
        $externalMock->shouldReceive('getSomething')
            ->once()
            ->andReturn('Tested!');

        $service = new InternalService();
        $result = $service->callExternalService($param);
        $this->assertSame('Tested!', $result);
    }

    /*
    protected function tearDown()
    {
        M::close();
    }
    */
}
