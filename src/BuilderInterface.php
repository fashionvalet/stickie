<?php

namespace FashionValet\Stickie;

interface BuilderInterface
{
    public function getCommandPipe();
    
    public function compose();
}
