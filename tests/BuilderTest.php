<?php

namespace TestCase;

use FashionValet\Stickie\Builder;
use FashionValet\Stickie\Command;

class BuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCommandPipeMethod()
    {
        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $this->assertInstanceOf('\FashionValet\Stickie\Command\CommandPipeInterface', $builder->getCommandPipe());
    }

    public function testResetMemoryMethod()
    {
        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Memory\Format;
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\Builder', $builder->resetMemory());
    }

    public function testSetLabelWidthMethod()
    {
        $width = 50;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\Width($width);
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\Builder', $builder->setLabelWidth($width));
    }

    public function testSetLabelHeightMethod()
    {
        $height = 45;
        $spacing = 3;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\Height($height, $spacing);
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\Builder', $builder->setLabelHeight($height, $spacing));
    }

    public function testSetDensityMethod()
    {
        $density = 10;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\Density($density);
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\Builder', $builder->setDensity($density));
    }

    public function testComposeMethod()
    {
        $width = 50;
        $height = 45;
        $spacing = 3;
        $density = 10;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $commandFormat = new Command\Memory\Format;
        $commandPipe->addCommand($commandFormat)->shouldBeCalled();
        $commandWidth = new Command\Printing\Width($width);
        $commandPipe->addCommand($commandWidth)->shouldBeCalled();
        $commandHeight = new Command\Printing\Height($height, $spacing);
        $commandPipe->addCommand($commandHeight)->shouldBeCalled();
        $commandDensity = new Command\Printing\Density($density);
        $commandPipe->addCommand($commandDensity)->shouldBeCalled();

        $commandPipe->getCommands()->shouldBeCalled()->willReturn(['~MDEL', '^W50', '^Q45,3', '^H10']);

        $builder->resetMemory()
            ->setLabelWidth($width)
            ->setLabelHeight($height, $spacing)
            ->setDensity($density);

        $stub = "~MDEL\n^W50\n^Q45,3\n^H10\n";

        $this->assertEquals($stub, $builder->compose());
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\EmptyCommandException
     */
    public function testComposeThrowException()
    {
        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $builder->compose();
    }
}
