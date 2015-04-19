<?php
namespace beeare\MockingStubbing;

use \Mockery as M;

/**
 * @see http://www.sitepoint.com/mock-test-dependencies-mockery/
 */
class TemperatureServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTempFahrenheit()
    {
        $weatherServiceMock = M::mock('beeare\MockingStubbing\WeatherServiceInterface');
        $weatherServiceMock->shouldReceive('getTempCelsius')->between(0, 5)->andReturn(0, 25, 40, 100);

        $temperatureService = new TemperatureService($weatherServiceMock);
        $this->assertEquals(32, $temperatureService->getTempFahrenheit());
        $this->assertEquals(77, $temperatureService->getTempFahrenheit());
        $this->assertEquals(104, $temperatureService->getTempFahrenheit());
        $this->assertEquals(212, $temperatureService->getTempFahrenheit());
        $this->assertEquals(212, $temperatureService->getTempFahrenheit());
    }
}
