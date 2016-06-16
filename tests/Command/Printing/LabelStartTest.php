<?php

namespace TestCase\Command\Printing;

use FashionValet\Stickie\Command\Printing\LabelStart as Command;

class LabelStartTest extends \PHPUnit_Framework_TestCase
{
    protected $command;

    public function setUp()
    {
        $this->command = new Command;
    }

    public function tearDown()
    {
        $this->command = null;
    }

    public function testGetCodeMethod()
    {
        $this->assertEquals('L', $this->command->getCode());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('^L', $this->command->toCommand());
    }
}
