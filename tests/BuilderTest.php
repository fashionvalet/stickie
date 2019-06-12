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

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->resetMemory());
    }

    public function testSetLabelWidthMethod()
    {
        $width = 50;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\Width($width);
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->setLabelWidth($width));
    }

    public function testSetLabelHeightMethod()
    {
        $height = 45;
        $spacing = 3;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\Height($height, $spacing);
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->setLabelHeight($height, $spacing));
    }

    public function testSetDensityMethod()
    {
        $density = 10;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\Density($density);
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->setDensity($density));
    }

    public function testCopiesMethod()
    {
        $copies = 1;

        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\Copy($copies);
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->copies($copies));
    }

    public function testLabelStartMethod()
    {
        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\LabelStart;
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->labelStart());
    }

    public function testLabelEndMethod()
    {
        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Printing\LabelEnd;
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->labelEnd());
    }

    public function testBarcodeMethod()
    {
        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Image\Barcode('CODE128', 55, 10, 2, 10, 70, 0, 1, 'Foobar');
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->barcode('CODE128', 55, 10, 2, 10, 70, 0, 1, 'Foobar'));
    }

    public function testTextMethod()
    {
        $commandPipe = $this->prophesize('\FashionValet\Stickie\Command\CommandPipeInterface');
        $builder = new Builder($commandPipe->reveal());

        $command = new Command\Text\Font(10, 25, 120, 1, 1, 0, 0, 'Foobar');
        $commandPipe->addCommand($command)->shouldBeCalled();

        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $builder->text(10, 25, 120, 1, 1, 0, 0, 'Foobar'));
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
        $commandLabelStart = new Command\Printing\LabelStart();
        $commandPipe->addCommand($commandLabelStart)->shouldBeCalled();
        $commandBarcode = new Command\Image\Barcode('CODE128', 55, 10, 2, 10, 70, 0, 1, 'Foobar');
        $commandPipe->addCommand($commandBarcode)->shouldBeCalled();
        $commandText = new Command\Text\Font(10, 25, 120, 1, 1, 0, 0, 'Foobar');
        $commandPipe->addCommand($commandText)->shouldBeCalled();
        $commandLabelEnd = new Command\Printing\LabelEnd();
        $commandPipe->addCommand($commandLabelEnd)->shouldBeCalled();

        $commandPipe->getCommands()->shouldBeCalled()->willReturn(['~MDEL', '^W50', '^Q45,3', '^H10', 'L', 'BQ, 55, 10, 2, 10, 70, 0, 1, Foobar', 'AB, 25, 120, 1, 1, 0, 0, Foobar', 'E']);

        $builder->resetMemory()
            ->setLabelWidth($width)
            ->setLabelHeight($height, $spacing)
            ->setDensity($density)
            ->labelStart()
            ->barcode('CODE128', 55, 10, 2, 10, 70, 0, 1, 'Foobar')
            ->text(10, 25, 120, 1, 1, 0, 0, 'Foobar')
            ->labelEnd();

        $stub = "~MDEL\n^W50\n^Q45,3\n^H10\nL\nBQ, 55, 10, 2, 10, 70, 0, 1, Foobar\nAB, 25, 120, 1, 1, 0, 0, Foobar\nE\n";

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
