<?php

namespace FashionValet\Stickie\Command\Text;

trait SizeTrait
{
    protected function convert($size)
    {
        switch ($size) {
            case 6:
                return 'A';
                break;
            case 8:
                return 'B';
                break;
            case 10:
                return 'C';
                break;
            case 12:
                return 'D';
                break;
            case 14:
                return 'E';
                break;
            case 18:
                return 'F';
                break;
            case 24:
                return 'G';
                break;
            case 30:
                return 'H';
                break;
        }
    }
}
