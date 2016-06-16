<?php

namespace TestCase\Command;

use FashionValet\Stickie\Command\CommandPipe;

class CommandPipeTest extends \PHPUnit_Framework_TestCase
{
    protected $commandPipe;

    public function setUp()
    {
        $this->commandPipe = new CommandPipe;
    }

    public function tearDown()
    {
        $this->commandPipe = null;
    }

    public function testAddAndGetCommandMethod()
    {
        $command = $this->prophesize('\FashionValet\Stickie\Command\CommandInterface');
        $command->toCommand()->shouldBeCalled()->willReturn('~MDEL');

        $this->assertInstanceOf('\FashionValet\Stickie\Command\CommandPipeInterface', $this->commandPipe->addCommand($command->reveal()));

        $this->assertEquals(['~MDEL'], $this->commandPipe->getCommands());
    }

    public function testRemoveCommandMethod()
    {
        $command = $this->prophesize('\FashionValet\Stickie\Command\CommandInterface');
        $command->toCommand()->shouldBeCalledTimes(2)->willReturn('~MDEL');

        $this->commandPipe->addCommand($command->reveal());
        $this->assertEquals(['~MDEL'], $this->commandPipe->getCommands());

        $this->commandPipe->removeCommand($command->reveal());
        $this->assertEquals([], $this->commandPipe->getCommands());
    }

    public function testFlushCommandsMethod()
    {
        $this->assertInstanceOf('\FashionValet\Stickie\Command\CommandPipeInterface', $this->commandPipe->flushCommands());

        $this->assertEquals([], $this->commandPipe->getCommands());
    }
}
