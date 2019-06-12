<?php

namespace TestCase\Command\Printing;

use FashionValet\Stickie\Command\Printing\LabelEnd as Command;

class LabelEndTest extends \PHPUnit_Framework_TestCase
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
        $this->assertEquals('E', $this->command->getCode());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('E', $this->command->toCommand());
    }
}
