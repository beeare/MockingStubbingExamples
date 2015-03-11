<?php
namespace beeare\MockingStubbing;

class MockingWithMockeryTest extends \PHPUnit_Framework_TestCase
{
    public function testHasCheese()
    {
        $mockingWithMockery = new MockingWithMockery;
        $this->assertTrue($mockingWithMockery->hasCheese());
    }
}
