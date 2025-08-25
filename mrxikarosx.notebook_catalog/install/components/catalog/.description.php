<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = [
    'NAME' => Loc::getMessage('CATALOG_NAME'),
    'DESCRIPTION' => Loc::getMessage('CATALOG_DESCRIPTION'),
    'CACHE_PATH' => 'Y',
    'SORT' => 10,
    'COMPLEX' => 'Y',
    'PATH' => [
        'ID' => 'mrxikarosx_components',
        'NAME' => Loc::getMessage('CATALOG_PATH_NAME'),
        'CHILD' => [
            'ID' => 'complex_components',
            'NAME' => Loc::getMessage('CATALOG_PATH_CHILD_NAME')
        ]
    ]
];
