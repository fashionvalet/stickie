<?php

namespace TestCase\Command\Printing;

use FashionValet\Stickie\Command\Printing\Height as Command;

class HeightTest extends \PHPUnit_Framework_TestCase
{
    protected $height = 30;

    protected $spacing = 3;

    protected $command;

    public function setUp()
    {
        $this->command = new Command($this->height, $this->spacing);
    }

    public function tearDown()
    {
        $this->command = null;
    }

    public function testGetCodeMethod()
    {
        $this->assertEquals('Q', $this->command->getCode());
    }

    public function testGetHeightMethod()
    {
        $this->assertEquals($this->height, $this->command->getHeight());
    }

    public function testGetSpacingMethod()
    {
        $this->assertEquals($this->spacing, $this->command->getSpacing());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('^Q30,3', $this->command->toCommand());
    }

    public function testWithoutSpacing()
    {
        $height = 30;
        $command = new Command($height);

        $this->assertEquals($height, $command->getHeight());
        $this->assertNull($command->getSpacing());

        $this->assertEquals('^Q30', $command->toCommand());
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\ExpectedIntegerException
     */
    public function testHeightThrowInvalidArgumentException()
    {
        $command = new Command('ABC');
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\ExpectedIntegerException
     */
    public function testSpacingThrowInvalidArgumentException()
    {
        $command = new Command(30, 'foo');
    }
}
