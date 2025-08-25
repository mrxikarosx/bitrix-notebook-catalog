<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = [
    'NAME' => Loc::getMessage('CATALOG_DETAIL_NAME'),
    'DESCRIPTION' => Loc::getMessage('CATALOG_DETAIL_DESCRIPTION'),
    'CACHE_PATH' => 'Y',
    'SORT' => 20,
    'PATH' => [
        'ID' => 'mrxikarosx_components',
        'NAME' => Loc::getMessage('CATALOG_DETAIL_PATH_NAME'),
        'CHILD' => [
            'ID' => 'simple_components',
            'NAME' => Loc::getMessage('CATALOG_DETAIL_PATH_CHILD_NAME')
        ]
    ]
];
