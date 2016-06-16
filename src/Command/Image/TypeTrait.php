<?php

namespace FashionValet\Stickie\Command\Image;

trait TypeTrait
{
    protected function convert($barcode)
    {
        switch ($barcode) {
            case 'CODE39':
                return 'A';
                break;
            case 'LOGMARS':
                return 'A7';
                break;
            case 'CODE32':
                return 'A8';
                break;
            case 'EAN8':
                return 'B';
                break;
            case 'EAN13':
                return 'E';
                break;
            case 'UPCA':
                return 'H';
                break;
            case 'UPCE':
                return 'K';
                break;
            case 'I2OF5':
                return 'N';
                break;
            case 'STANDARD2OF5':
                return 'N4';
                break;
            case 'INDUSTRIAL2OF5':
                return 'N5';
                break;
            case 'CODABAR':
                return 'O';
                break;
            case 'CODE93':
                return 'P';
                break;
            case 'CODE128':
                return 'Q';
                break;
            case 'CODE128A':
                return 'Q2';
                break;
            case 'CODE128B':
                return 'Q2';
                break;
            case 'CODE128C':
                return 'Q2';
                break;
        }
    }
}
