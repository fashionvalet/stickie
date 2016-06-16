<?php

namespace FashionValet\Stickie\Command;

interface ComposerInterface
{
    public function add(CommandInterface $command);

    public function commands();

    public function flush();
}
