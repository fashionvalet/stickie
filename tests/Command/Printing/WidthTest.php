<?php

namespace TestCase\Command\Printing;

use FashionValet\Stickie\Command\Printing\Width as Command;

class WidthTest extends \PHPUnit_Framework_TestCase
{
    protected $width = 50;

    protected $command;

    public function setUp()
    {
        $this->command = new Command($this->width);
    }

    public function tearDown()
    {
        $this->command = null;
    }

    public function testGetCodeMethod()
    {
        $this->assertEquals('W', $this->command->getCode());
    }

    public function testGetWidthMethod()
    {
        $this->assertEquals($this->width, $this->command->getWidth());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('^W50', $this->command->toCommand());
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\ExpectedIntegerException
     */
    public function testInvalidArgumentException()
    {
        $command = new Command('foo');
    }
}
