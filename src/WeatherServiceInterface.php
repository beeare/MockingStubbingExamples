<?php
namespace beeare\MockingStubbing;

/**
 * @see http://www.sitepoint.com/mock-test-dependencies-mockery/
 */
interface WeatherServiceInterface
{
    /**
     * Return the temperature in °C
     *
     * @return float
     */
    public function getTempCelsius();
}
