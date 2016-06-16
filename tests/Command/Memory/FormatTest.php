<?php

namespace TestCase\Command\Memory;

use FashionValet\Stickie\Command\Memory\Format as Command;

class FormatTest extends \PHPUnit_Framework_TestCase
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
        $this->assertEquals('MDEL', $this->command->getCode());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('~MDEL', $this->command->toCommand());
    }
}
