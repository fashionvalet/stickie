<?php

namespace FashionValet\Stickie\Command\Service;

use FashionValet\Stickie\Command\AbstractableCommand;

/**
 * Status immediate response command
 * ~S,CHECK
 * @see https://www.godexintl.com/downloads?type=15484006893927195&locale=en
 * Note: Before using this command, the “^XSET,IMMEDIATE” (Set immediate response on/off) command should be turned on.
 *
 */
class Status extends AbstractableCommand
{
    public const STATUS_READY = '00';
    public const STATUS_MEDIA_EMPTY_OR_MEDIA_JAM_A = '01';
    public const STATUS_MEDIA_EMPTY_OR_MEDIA_JAM_B = '02';
    public const STATUS_RIBBON_EMPTY = '03';
    public const STATUS_PRINT_HEAD_UP_OPEN = '04';
    public const STATUS_REWINDER_FULL = '05';
    public const STATUS_FILE_SYSTEM_FULL = '06';
    public const STATUS_FILENAME_NOT_FOUND = '07';
    public const STATUS_DUPLICATE_NAME = '08';
    public const STATUS_SYNTAX_ERROR = '09';
    public const STATUS_CUTTER_JAM = '10';
    public const STATUS_EXTENDED_MEMORY_NOT_FOUND = '11';
    public const STATUS_PAUSE = '20';
    public const STATUS_IN_SETTING_MODE = '21';
    public const STATUS_IN_KEYBOARD_MODE = '22';
    public const STATUS_PRINTER_IS_PRINTING = '50';
    public const STATUS_DATA_IN_PROCESS = '60';

    public const STATUS_LABELS = [
        self::STATUS_READY => 'Ready',
        self::STATUS_MEDIA_EMPTY_OR_MEDIA_JAM_A => 'Media Empty or Media Jam',
        self::STATUS_MEDIA_EMPTY_OR_MEDIA_JAM_B => 'Media Empty or Media Jam',
        self::STATUS_RIBBON_EMPTY => 'Ribbon Empty',
        self::STATUS_PRINT_HEAD_UP_OPEN => 'Printhead Up ( Open )',
        self::STATUS_REWINDER_FULL => 'Rewinder Full',
        self::STATUS_FILE_SYSTEM_FULL => 'File System Full',
        self::STATUS_FILENAME_NOT_FOUND => 'Filename Not Found',
        self::STATUS_DUPLICATE_NAME => 'Duplicate Name',
        self::STATUS_SYNTAX_ERROR => 'Syntax error',
        self::STATUS_CUTTER_JAM => 'Cutter JAM',
        self::STATUS_EXTENDED_MEMORY_NOT_FOUND => 'Extended Menory Not Found',
        self::STATUS_PAUSE => 'Pause',
        self::STATUS_IN_SETTING_MODE => 'In Setting Mode',
        self::STATUS_IN_KEYBOARD_MODE => 'In Keyboard Mode',
        self::STATUS_PRINTER_IS_PRINTING => 'Printer is Printing',
        self::STATUS_DATA_IN_PROCESS => 'Data in Process'
    ];
    protected $code = 'S,CHECK';

    public function toCommand()
    {
        return $this->getControlPrefix() . $this->getCode();
    }

    public function getResponseLabel(string $responseCode)
    {
        return self::STATUS_LABELS[$responseCode] ?? $responseCode;
    }
}
