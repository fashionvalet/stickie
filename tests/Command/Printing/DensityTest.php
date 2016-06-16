<?php

namespace TestCase\Command\Printing;

use FashionValet\Stickie\Command\Printing\Density as Command;

class DensityTest extends \PHPUnit_Framework_TestCase
{
    const DENSITY = 10;

    protected $command;

    public function setUp()
    {
        $this->command = new Command(self::DENSITY);
    }

    public function tearDown()
    {
        $this->command = null;
    }

    public function testGetDensityMethod()
    {
        $this->assertEquals(self::DENSITY, $this->command->getDensity());
    }

    public function testGetCodeMethod()
    {
        $this->assertEquals('H', $this->command->getCode());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('^H10', $this->command->toCommand());
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\ExpectedIntegerException
     * @return [type] [description]
     */
    public function testExpectedIntegerException()
    {
        $command = new Command('foo');
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\OutOfRangeException
     * @return [type] [description]
     */
    public function testOutOfRangeException()
    {
        $command = new Command(100);
    }
}
