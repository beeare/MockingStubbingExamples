<?php
namespace beeare\MockingStubbing;

/**
 * @see http://www.sitepoint.com/mock-test-dependencies-mockery/
 */
class TemperatureService
{
    /**
     * @var WeatherServiceInterface
     */
    private $weatherService;

    /**
     * @param WeatherServiceInterface $weatherService
     */
    public function __construct(WeatherServiceInterface $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Get current temperature in °F
     *
     * @return float
     */
    public function getTempFahrenheit()
    {
        return ($this->weatherService->getTempCelsius() * 1.8000) + 32;
    }
}
