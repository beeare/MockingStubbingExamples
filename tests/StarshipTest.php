<?php
namespace beeare\MockingStubbing;

use \Mockery as M;

class StarshipTest extends \PHPUnit_Framework_TestCase
{
    public function testEngineeringResponseToEnteringOrbit()
    {
        $mock = M::mock('Engineering');
        $mock->shouldReceive('disengageWarp')->once()->ordered();
        $mock->shouldReceive('divertPower')->with(0.40, 'sensors')->once()->ordered();
        $mock->shouldReceive('divertPower')->with(0.30, 'auxengines')->once()->ordered();
        $mock->shouldReceive('runDiagnosticLevel')->with(1)->once()->ordered();
        $mock->shouldReceive('runDiagnosticLevel')->with(M::type('int'))->zeroOrMoreTimes();

        $starship = new Starship($mock);
        $starship->enterOrbit();
    }
}

