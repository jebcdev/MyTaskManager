<?php

namespace App\Enums;

enum BgEnums: string
{
    case PRIMARY = 'bg-primary';
    case SECONDARY = 'bg-secondary';
    case SUCCESS = 'bg-success';
    case DANGER = 'bg-danger';
    case WARNING = 'bg-warning';
    case INFO = 'bg-info';
    case LIGHT = 'bg-light';
    case DARK = 'bg-dark';
    case WHITE = 'bg-white';

    public static function toArray(): array
    {
        return [
            'PRIMARY' => self::PRIMARY->value,
            'SECONDARY' => self::SECONDARY->value,
            'SUCCESS' => self::SUCCESS->value,
            'DANGER' => self::DANGER->value,
            'WARNING' => self::WARNING->value,
            'INFO' => self::INFO->value,
            'LIGHT' => self::LIGHT->value,
            'DARK' => self::DARK->value,
            'WHITE' => self::WHITE->value,
        ];
    }
}
