<?php

namespace App\Enums;

enum NewsSource: string
{
    case RAMBLER = 'https://help.rambler.ru/news/';
    case MAIL = 'https://api.mail.ru/category/news/';

    public static function all():array
    {
        return [
            self::RAMBLER->value => 'https://help.rambler.ru/news/',
            self::MAIL->value => 'https://api.mail.ru/category/news/'
        ];
    }
}
