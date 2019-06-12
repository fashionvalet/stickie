<?php

namespace TestCase\Command\Text;

use FashionValet\Stickie\Command\Text\Font as Command;

class FontTest extends \PHPUnit_Framework_TestCase
{
    protected $command;

    public function setUp()
    {
        $this->command = new Command(10, 25, 120, 1, 1, 0, 0, 'Foobar');
    }

    public function tearDown()
    {
        $this->command = null;
    }

    public function testGetCodeMethod()
    {
        $this->assertEquals('A', $this->command->getCode());
    }

    public function testGetHorizontalMethod()
    {
        $this->assertEquals(25, $this->command->getHorizontal());
    }

    public function testGetVerticalMethod()
    {
        $this->assertEquals(120, $this->command->getVertical());
    }

    public function testGetMagnifyHorizontalMethod()
    {
        $this->assertEquals(1, $this->command->getMagnifyHorizontal());
    }

    public function testGetMagnifyVerticalMethod()
    {
        $this->assertEquals(1, $this->command->getMagnifyVertical());
    }

    public function testGetGapMethod()
    {
        $this->assertEquals(0, $this->command->getGap());
    }

    public function testGetRotationMethod()
    {
        $this->assertEquals(0, $this->command->getRotation());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('AC, 25, 120, 1, 1, 0, 0, Foobar', $this->command->toCommand());
    }
}
